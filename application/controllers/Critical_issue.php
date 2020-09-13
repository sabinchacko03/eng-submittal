<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Critical_issue extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Critical_issue_model');
        $this->load->model('User_model');

        $this->load->library("phpmailer_library");
    }

    public function index() {
        $data['issues'] = $this->Critical_issue_model->getIssueSummary();
        $this->load->view('critical_issue/index', $data);
        $this->load->view('layout/footer');
    }

    public function AJAXgetIssueProject() {
        $project = $this->input->post('project');
        $data['issues'] = $this->Critical_issue_model->getCriticalIssuesByProject($project);
        echo($this->load->view('critical_issue/issue_summary_ajax', $data, TRUE));
    }

    public function AJAXgetIssueSummary() {
        $data['issues'] = $this->Critical_issue_model->getIssueSummary();
        echo($this->load->view('critical_issue/overall_issue_summary_ajax', $data, TRUE));
    }

    public function AJAXgetCriticalIssueForm() {
        $data['projects'] = $this->Admin_model->getCurrentProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();
        $data['status'] = $this->Critical_issue_model->getAllCriticalIssueStatus();
        $data['issue_master'] = $this->Critical_issue_model->getAllCriticalIssueMaster();
        $data['users'] = $this->User_model->getAllUsers();

        echo($this->load->view('critical_issue/add_issue', $data, TRUE));
    }

    public function AJAXaddCriticalIssue() {
        $res = $this->Critical_issue_model->insertCriticalIssue();
        if ($res) {
            $mailContent = '';
            $issueDetails = $this->Critical_issue_model->getCriticalIssues($res);
            foreach ($issueDetails->result() as $row) {
                $mailContent .= "<p>Issue : " . $row->issue . '</p>';
                $mailContent .= "<p>Project : " . $row->project_name . '</p>';
                $mailContent .= "<p>Department : " . $row->department . '</p>';
                $mailContent .= "<p>Status : " . $row->status . '</p>';
                $mailContent .= "<p>Issue Owner : " . $row->issue_owner . '</p>';
                $mailContent .= "<p>Description : " . $row->description . '</p>';
                $issueOwner = $row->owner_id;
            }
            $mailDetails['content'] = $mailContent;
            $mailDetails['toEmail'] = $this->User_model->getAdminEmails();
            $issueOwnerEmail = $this->User_model->getUserEmail($issueOwner);
            $mailDetails['toEmail'][$issueOwnerEmail] = $issueOwnerEmail;
            $mailDetails['subject'] = 'New Critical Issue has been created';
            $this->sendMail2($mailDetails);
        }
        $project = $this->input->post('project');
        $data['issues'] = $this->Critical_issue_model->getCriticalIssuesByProject($project);
        echo($this->load->view('critical_issue/issue_summary_ajax', $data, TRUE));
    }

    public function add_critial_issue() {
        $data['projects'] = $this->Admin_model->getAllProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();
        $data['status'] = $this->Critical_issue_model->getIssueStatus();

        if ($this->form_validation->run()) {
            if ($this->Critical_issue_model->insertCriticalIssue()) {
                $this->session->set_flashdata('success', 'Critical Issue Added...');
                redirect('critical_issue/add');
            }
        }
        $data['details'] = $this->Critical_issue_model->getCriticalIssues();
        $this->load->view('admin/add_critical_issue', $data);
        $this->load->view('layout/footer');
    }

    public function add_master() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[critical_issue_master.name]', array('is_unique' => 'Issue Type already exists'));
        if ($this->form_validation->run()) {
            $this->Critical_issue_model->insertIssueMaster();
            $this->session->set_flashdata('msg', 'Master Added...');
        }
        $this->load->view('critical_issue/add_master');
        $this->load->view('layout/footer');
    }

    public function AJAXissueEditForm() {
        $id = $this->input->post('issue');
        $data['issue_details'] = $this->Critical_issue_model->getCriticalIssues($id);
        $data['status'] = $this->Critical_issue_model->getAllCriticalIssueStatus();
        $data['issue_master'] = $this->Critical_issue_model->getAllCriticalIssueMaster();
        $data['users'] = $this->User_model->getAllUsers();
        echo($this->load->view('critical_issue/edit_issue', $data, TRUE));
    }

    public function AJAXupdateForm() {
        $project = $this->input->post('project');
        $res = $this->Critical_issue_model->updateCriticalIssue();
        if ($res) {
            $mailContent = '';
            $issueDetails = $this->Critical_issue_model->getCriticalIssues($this->input->post('id'));
            foreach ($issueDetails->result() as $row) {
                $mailContent .= "<p>Issue : " . $row->issue . '</p>';
                $mailContent .= "<p>Project : " . $row->project_name . '</p>';
                $mailContent .= "<p>Department : " . $row->department . '</p>';
                $mailContent .= "<p>Status : " . $row->status . '</p>';
                $mailContent .= "<p>Issue Owner : " . $row->issue_owner . '</p>';
                $mailContent .= "<p>Assignee : " . $row->assignee . '</p>';
                $mailContent .= "<p>Description : " . $row->description . '</p>';
                $issueOwner = $row->owner_id;
                $assignee = $row->assignee_id;
            }
            $mailDetails['content'] = $mailContent;
            $mailDetails['toEmail'] = $this->User_model->getAdminEmails();
            $issueOwnerEmail = $this->User_model->getUserEmail($issueOwner);
            $assigneeEmail = $this->User_model->getUserEmail($assignee);
            $mailDetails['toEmail'][$issueOwnerEmail] = $issueOwnerEmail;
            $mailDetails['toEmail'][$assigneeEmail] = $assigneeEmail;
            $mailDetails['subject'] = 'Critical Issue is Updated';

            $this->sendMail2($mailDetails);
        }

        $data['issues'] = $this->Critical_issue_model->getCriticalIssuesByProject($project);
        echo($this->load->view('critical_issue/issue_summary_ajax', $data, TRUE));
    }

    public function AJAXvalidateIssue() {
        $result['result'] = 'true';
        $result['msg'] = '';
        if (!$this->Critical_issue_model->checkIssueExistsOnDateForUser()) {
            $result['result'] = 'false';
            $result['msg'] = 'Issue already exists!';
        }
        echo json_encode($result);
    }

    public function sendMail2($mailDetails = array()) {
        include APPPATH . 'third_party/sendgrid-php/sendgrid-php.php';
        $CI = & get_instance();
        $CI->config->load('sendgrid');

        $email = new \SendGrid\Mail\Mail();
        $email->setFrom("test@nadeer500.com", "MEP Test");
//        $email->setSubject("New Critical Issue has been created");
        $email->setSubject($mailDetails['subject']);
        $email->addTos($mailDetails['toEmail']);
//        $email->addTo('sabinchacko03@gmail.com','sabin');
        $email->addContent("text/plain", "subject");
        $email->addContent("text/html", "<h2>Please check the Critical Issue</h2>" . $mailDetails['content']);

        $apiKey = $CI->config->item('api_key', 'sendgrid');
        $sendgrid = new \SendGrid($apiKey);
        try {
            $response = $sendgrid->send($email);
//            print $response->statusCode() . "\n";
//            print_r($response->headers());
//            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }

    public function sendMail($mailDetails) {
        $mail = $this->phpmailer_library->load();
        $mail->isSMTP();
        $mail->Host = '800benaa.com';
//        $mail->Host = 'mail.nadeer500.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'info@duconodl.com';
        $mail->Password = 'PIBF.Hz6]O}w';

//        $mail->Username = 'mep@nadeer500.com';
//        $mail->Password = '_wzksmA@wjjC';
//        
//        $mail->Username = 'test@nadeer500.com';
//        $mail->Password = 'RlASZ)c9dA*H';
//        
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('info@duconodl.com', 'MEP Dashboard - Critical Issue');
//        $mail->addReplyTo('info@example.com', 'CodexWorld');
        // Add a recipient
        $mail->addAddress($mailDetails['toEmail'], 'sabinchacko03@gmail.com');
//        $mail->addAddress('sabinchacko03@gmail.com');
        // Add cc or bcc 
//        $mail->addCC('cc@example.com');
//        $mail->addBCC('bcc@example.com');
        // Email subject
        $mail->Subject = 'New Critical Issue has been created';

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h2>Please check the Critical Issue</h2>";
        $mailContent .= $mailDetails['content'];
        $mail->Body = $mailContent;

        $msg = '';
        // Send email
        if (!$mail->send()) {
            $msg .= 'Message could not be sent.';
            $msg .= 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $msg .= 'Message has been sent';
        }
    }

}
