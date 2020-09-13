<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->model('Billing_model');
    }

    public function index() {
        $data['summary'] = $this->Billing_model->getAllBillingSummary();
        $this->load->view('billing/index', $data);
        $this->load->view('layout/footer');
    }

    public function AJAXgetBillingProject() {
        $project = $this->input->post('project');
        $res = $this->Admin_model->getProjectDetails($project);
        foreach ($res->result() as $row) {
            $data['project_name'] = $row->name;
        }
        $data['project'] = $project;
        $data['billings'] = $this->Admin_model->getBilling($project);
        
        echo($this->load->view('billing/view_all_billing', $data, TRUE));
    }

    public function AJAXgetBillingSummary() {
        $data['summary'] = $this->Billing_model->getAllBillingSummary();
        echo($this->load->view('billing/billing_summary', $data, TRUE));
    }

    public function AJAXgetBillingForm() {
        $data['projects'] = $this->Admin_model->getCurrentProjects();
        $data['departments'] = $this->Admin_model->getAllDepartments();
        echo($this->load->view('billing/add_billing', $data, TRUE));
    }

    public function AJAXaddBilling() {
        $project = $this->input->post('project');
        $this->Admin_model->insertBilling();
        $res = $this->Admin_model->getProjectDetails($project);
        foreach ($res->result() as $row) {
            $data['project_name'] = $row->name;
        }
        $data['project'] = $project;
        $data['billings'] = $this->Admin_model->getBilling($project);
        echo($this->load->view('billing/view_all_billing', $data, TRUE));
    }

    public function AJAXgetDeptVal() {
        $project = $this->input->post('project');
        $dept = $this->input->post('dept');
        $val = array();
        $res = $this->Billing_model->getDeptVal($project);
        foreach ($res->result_array() as $row) {
            switch ($dept) {
                case 1 : $val['dept_val'] = $row['plumbing_total'] + $row['variation_plumbing'];
                    break;
                case 2 : $val['dept_val'] = $row['hvac_total'] + $row['variation_hvac'];
                    break;
                case 3 : $val['dept_val'] = $row['electrical_total'] + $row['variation_electrical'];
                    break;
                case 4 : $val['dept_val'] = $row['ff_total'] + $row['variation_ff'];
                    break;
                default : $val['dept_val'] = '';
            }
        }
        $resSum = $this->Billing_model->getBillingDepartmentTotal($project, $dept);
        foreach($resSum->result() as $row){
            $val['dept_sum'] = $row->projected_sum;
        }
        echo json_encode($val);
    }

    public function AJAXEditBilling() {
        $billing = $this->input->post('billing');
        $data['billing'] = $this->Billing_model->getBillingDetails($billing);
        echo ($this->load->view('billing/edit_billing', $data, TRUE));
    }

    public function AJAXUpdateBilling() {
        $res = $this->Billing_model->updateBilling();
        $project = $this->input->post('project');
        $res = $this->Admin_model->getProjectDetails($project);
        foreach ($res->result() as $row) {
            $data['project_name'] = $row->name;
        }
        $data['project'] = $project;
        $data['billings'] = $this->Admin_model->getBilling($project);
        echo($this->load->view('billing/view_all_billing', $data, TRUE));
    }

    public function AJAXCompareDates() {
        $project = $this->input->post('project');
        $department = $this->input->post('department');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $bill_date = date('Y-m', strtotime($year . '-' . $month));
        $res = $this->Admin_model->getProjectDetails($project);
        $result['result'] = 'true';
        $result['msg'] = '';
        foreach ($res->result() as $row) {
            if ($bill_date <= date('Y-m', strtotime($row->end_date)) && $bill_date >= date('Y-m', strtotime($row->start_date))) {
                $result['result'] = 'true';
            } else {
                $result['result'] = 'false';
                $result['msg'] = 'Date should be within project Start - End dates!';
            }
        }
        $res1 = $this->Billing_model->getBillingDepartmentMonth($project, $department, $year, $month);
        if ($res1->num_rows() > 0) {
            $result['result'] = 'false';
            $result['msg'] = 'Billing already entered for this month!';
        }
        echo json_encode($result);
    }

}
