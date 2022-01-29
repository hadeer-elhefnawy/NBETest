<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Fcaccessmatrix;
use App\Models\Maintenance;
use App\Models\Reports;
// use Auth;
use Illuminate\Support\Facades\Auth;

// use App\Models\Batch;
// use App\Models\Online;
// use App\Models\BranchRestriction;
// use App\Models\AccClassRestriction;
// use App\Models\GrantRights;
// use App\Models\QueueRights;
// use App\Models\PasswordRestriction;
// use App\Models\BranchLimit;
// use App\Models\ProcessStageRights;
// use App\Models\WebBranch;
// use App\Models\ProductPostingAllowed;
// use App\Models\ProductAccessAllowed;
// use App\Models\GroupRestriction;
// use App\Models\NodeGl;
// use App\Models\ExceptionalLeafGl;


class Wizard extends Component
{

    public $currentStep = 1;
    public array $role_function=array();
    // New Access Matrix
    public $group_name, $role_id, $role_description, $centralizaton_role, $status,$home_branch_no,$version_no,$completed,
    // Maintenance
    $main_menu,$sub_menu1,$sub_menu2,$maint_description,$new,$copy,$delete,$close,$unlock,$reopen,
    $print,$auth,$reverse,$rollover,$confirm,$liquidate,$hold,$template,$view,
    // Reports
    $role_function_report,$main_menu_report,$sub_menu1_report,$sub_menu2_report,$report_description,
    $print_report,$generate_report
    // Batch
    // $role_function_batch,$main_menu_batch,$sub_menu1_batch,$sub_menu2_batch,$batch_description,
    // $new_batch,$copy_batch,$delete_batch,$close_batch,$unlock_batch,$reopen_batch,$print_batch,
    // $auth_batch,$reverse_batch,$rollover_batch,$confirm_batch,$liquidate_batch,$hold_batch,
    // $template_batch,$view_batch,$generate_batch,
    // // Online
    // $role_function_online,$main_menu_online,$sub_menu1_online,$sub_menu2_online,$online_description,
    // $new_online,$copy_online,$delete_online,$close_online,$unlock_online,$reopen_online,$print_online,
    // $auth_online,$reverse_online,$rollover_online,$confirm_online,$liquidate_online,$hold_online,
    // $template_online,$view_online,
    // // Branch restriction
    // $branch_restriction,$branch,$branch_name,
    // // Account Class restriction
    // $acc_class_restriction,$acc_class,$acc_class_description,
    // // Grant Rights
    // $cancel,$change_node,$release,$change_media,$branch_move,$hold_branch_rights,$test_input,
    // $change_address,$reinstate,$change_priority,$auth_cancel,$auth_change_node,$release2,
    // $change_media2,$auth_branch_move,$hold_branch_rights2,$auth_test_input,$change_address2,
    // $auth_reinstate,$change_priority2,$install,$test_check,$link_contract,$change_branch_in,
    // $change_message,$change_force_release_fund,$suppress,$delete_branch_rights,
    // $print_branch_rights,$ft_upload,$move_to_queue,$change_address_in,$auth_change_message,
    // $auth_rights,$change_force_cover_match,
    // // Queue Rights
    // $queue_rights,
    // // Password Restriction
    // $password_restriction,
    // // Branch Limit
    // $authorizer_role,$limit_currency,$user_limit,
    // // Process Stage Rights
    // $role_function_Process_stage,$main_menu_Process_stage,$sub_menu1_Process_stage,
    // $sub_menu2_Process_stage,$Process_stage_description,$editable,
    // // Web Branch
    // $role_function_web_branch,$main_menu_web_branch,$sub_menu1_web_branch,$sub_menu2_web_branch,
    // $web_branch_description,
    // // Product Posting Allowed
    // $product_allowed,$product_code_posting,$product_desc_posting,
    // // Product Access Allowed
    // $product_access,$product_code_access,$product_desc_access,
    // // Group Restriction
    // $group_code_allowed,$group_code,$group_descripion,
    // // GL Restriction / Node GL'a
    // $gl_allowed_node,$node_gl_node,$node_gl_descripion_en_node,$node_gl_descripion_ar_node,
    // // GL Restriction / Exceptional Leaf Gl's
    // $gl_allowed_exceptional,$node_gl_exceptional,$node_gl_descripion_en_exceptional,
    // $node_gl_descripion_ar_exceptional,$exceptional_leaf_gl,$leaf_gl_description_en_exceptional,
    // $leaf_gl_description_ar_exceptional

    ;

    // |exists:fc_function_descrption


    public $updateMode = false;
    public $inputs = [];
    public $i = 1;


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }





    public $successMessage = '';

    public function mount()
    {

        // return view('livewire.wizard');    

        // if (Auth::check()){
        //     return view('livewire.wizard');    
        // } else {        

        //     // validation not successful, send back to form 
        //     // return redirect('login');
        //     // return redirect(route('login'));

        // }
    }

    public function newAcessMatrix()
    {
        $validatedData = $this->validate([
            'group_name' => 'required|string|max:50',
            'role_id' => 'required|string|max:15',
            'role_description' => 'required|string|max:50',
            'home_branch_no' => 'required|string|min:3|max:5',
            'version_no' => 'required|max:5',
        ]);

        $this->currentStep = 2;
    }

    public function maintenance()
    {
        $validatedData = $this->validate([
            'role_function' => 'required|string|max:10|exists:fc_function_description,FUNCTION_ID',
            'main_menu' => 'required|string|max:50|exists:fc_function_description,MAIN_MENU',
            'sub_menu1' => 'required|string|max:50|exists:fc_function_description,SUB_MENU_1',
            'sub_menu2' => 'required|string|max:50|exists:fc_function_description,SUB_MENU_2',
            'maint_description' => 'required|string|max:50|exists:fc_function_description,DESCRIPTION',
        
            // 'role_function.*' => 'required|string|max:10|exists:fc_function_description,FUNCTION_ID',
            // 'main_menu.*' => 'required|string|max:50|exists:fc_function_description,MAIN_MENU',
            // 'sub_menu1.*' => 'required|string|max:50|exists:fc_function_description,SUB_MENU_1',
            // 'sub_menu2.*' => 'required|string|max:50|exists:fc_function_description,SUB_MENU_2',
            // 'maint_description.*' => 'required|string|max:50|exists:fc_function_description,DESCRIPTION',
        
        
        
            ],

    
    
    );
  
        $this->currentStep = 3;
    }

    public function report()
    {
        $validatedData = $this->validate([
            'role_function_report' => 'required|string|max:10|exists:fc_function_description,FUNCTION_ID',
            'main_menu_report' => 'required|string|max:50|exists:fc_function_description,SUB_MENU_1',
            'sub_menu1_report' => 'required|string|max:50|exists:fc_function_description,SUB_MENU_1',
            'sub_menu2_report' => 'required|string|max:50|exists:fc_function_description,SUB_MENU_2',
            'report_description' => 'required|string|max:50|exists:fc_function_description,DESCRIPTION',
         
        ]);
  
        $this->currentStep = 4;
    }

  
    /////////////////////****************************************************/////////////////////////

    public function submitForm()
    { 
        
        $first_insert = Fcaccessmatrix::create([
            'group_name' => $this->group_name,
            'role_id' => $this->role_id,
            'role_description' => $this->role_description,
            'centralizaton_role' => '0',
            'status' => '0',
            'home_branch_no' => $this->home_branch_no,
            'version_no' => $this->version_no, 

        ]);
        $role_id=$first_insert->id;
        // foreach ($this->role_function as $key => $value) {

        Maintenance::create([
            'role_id' => $role_id,
            'role_function' => $this->role_function,
            'main_menu' => $this->main_menu,
            'sub_menu1' => $this->sub_menu1,
            'sub_menu2' => $this->sub_menu2,
            'maint_description' => $this->maint_description,
            'new' => '0',
            'copy' => '0',
            'delete' => '0',
            'close' => '0',
            'unlock' => '0',
            'reopen' => '0',
            'print' => '0',
            'auth' => '0',
            'reverse' => '0',
            'rollover' => '0',
            'confirm' => '0',
            'liquidate' => '0',
            'hold' => '0',
            'template' => '0',
            'view' => '0',
        ]);
        Reports::create([
            'role_id' => $role_id,
            'role_function_report' => $this->role_function_report,
            'main_menu_report' => $this->main_menu_report,
            'sub_menu1_report' => $this->sub_menu1_report,
            'sub_menu2_report' => $this->sub_menu2_report,
            'report_description' => $this->report_description,
            'print_report' => '0',
            'generate_report' => '0',
        ]);

//  }
        $this->inputs = [];
        $this->successMessage = 'Access Matrix Created Successfully.';
        // $this->clearForm();
        $this->currentStep = 1;
    }






public function back($step)
{
    $this->currentStep = $step;    
}


public function clearForm()
{
    // NewAccessMatrix
    $this->group_name = '';
    $this->role_id = '';
    $this->role_description = '';
    $this->centralizaton_role = '';
    $this->status = '';
    $this->home_branch_no = '';
    $this->version_no = '';
    //Maintenance
    $this->role_id = '';
    $this->role_function = '';
    $this->main_menu = '';
    $this->sub_menu1 = '';
    $this->sub_menu2 = '';
    $this->maint_description = '';
    $this->new = '';
    $this->copy = '';
    $this->delete = '';
    $this->close = '';
    $this->unlock = '';
    $this->reopen = '';
    $this->print = '';
    $this->auth = '';
    $this->reverse = '';
    $this->rollover = '';
    $this->confirm = '';
    $this->liquidate = '';
    $this->hold = '';
    $this->template = '';
    $this->view = '';
    // Reports
    $this->role_id = '';
    $this->role_function_report = '';
    $this->main_menu_report = '';
    $this->sub_menu1_report = '';
    $this->sub_menu2_report = '';
    $this->report_description = '';
    $this->print_report = '';
    $this->generate_report = '';

    // Batch

    // $this->role_id = '';
    // $this->role_function_batch = '';
    // $this->main_menu_batch = '';
    // $this->sub_menu1_batch = '';
    // $this->sub_menu2_batch = '';
    // $this->batch_description = '';
    // $this->new_batch = '';
    // $this->copy_batch = '';
    // $this->delete_batch = '';
    // $this->close_batch = '';
    // $this->unlock_batch = '';
    // $this->reopen_batch = '';
    // $this->print_batch = '';
    // $this->auth_batch = '';
    // $this->reverse_batch = '';
    // $this->rollover_batch = '';
    // $this->confirm_batch = '';
    // $this->liquidate_batch = '';
    // $this->hold_batch = '';
    // $this->template_batch = '';
    // $this->view_batch = '';
    // $this->generate_batch = '';

    // Online

    // $this->role_id = '';
    // $this->role_function_online = '';
    // $this->main_menu_online = '';
    // $this->sub_menu1_online = '';
    // $this->sub_menu2_online = '';
    // $this->online_description = '';
    // $this->new_online = '';
    // $this->copy_online = '';
    // $this->delete_online = '';
    // $this->close_online = '';
    // $this->unlock_online = '';
    // $this->reopen_online = '';
    // $this->print_online = '';
    // $this->auth_online = '';
    // $this->reverse_online = '';
    // $this->rollover_online = '';
    // $this->confirm_online = '';
    // $this->liquidate_online = '';
    // $this->hold_online = '';
    // $this->template_online = '';
    // $this->view_online = '';

    // Branch Restiction

    // $this->role_id = '';
    // $this->branch_restriction = '';
    // $this->branch = '';
    // $this->branch_name = '';

    // Branch Restiction

    // $this->role_id = '';
    // $this->acc_class_restriction = '';
    // $this->acc_class = '';
    // $this->acc_class_description = '';

    // Grant Rights

    // $this->role_id = '';
    // $this->cancel = '';
    // $this->change_node = '';
    // $this->release = '';
    // $this->change_media = '';
    // $this->branch_move = '';
    // $this->hold_branch_rights = '';
    // $this->test_input = '';
    // $this->change_address = '';
    // $this->reinstate = '';
    // $this->change_priority = '';
    // $this->auth_cancel = '';
    // $this->auth_change_node = '';
    // $this->release2 = '';
    // $this->change_media2 = '';
    // $this->auth_branch_move = '';
    // $this->hold_branch_rights2 = '';
    // $this->auth_test_input = '';
    // $this->change_address2 = '';
    // $this->auth_reinstate = '';
    // $this->change_priority2 = '';
    // $this->install = '';
    // $this->test_check = '';
    // $this->link_contract = '';
    // $this->change_branch_in = '';
    // $this->change_message = '';
    // $this->change_force_release_fund = '';
    // $this->suppress = '';
    // $this->delete_branch_rights = '';
    // $this->print_branch_rights = '';
    // $this->ft_upload = '';
    // $this->move_to_queue = '';
    // $this->change_address_in = '';
    // $this->auth_change_message = '';
    // $this->auth_rights = '';
    // $this->change_force_cover_match = '';

    // Queue Rights

    // $this->role_id = '';
    // $this->queue_rights = '';

    // Password Restriction

    // $this->role_id = '';
    // $this->password_restriction = '';
    
    // Branch Limit

    // $this->authorizer_role = '';
    // $this->limit_currency = '';
    // $this->user_limit = '';

    // Process Stage Rights

    // $this->role_function_Process_stage = '';
    // $this->main_menu_Process_stage = '';
    // $this->sub_menu1_Process_stage = '';
    // $this->sub_menu2_Process_stage = '';
    // $this->Process_stage_description = '';
    // $this->editable = '';

    // Process Stage Rights

    // $this->role_function_web_branch = '';
    // $this->main_menu_web_branch = '';
    // $this->sub_menu1_web_branch = '';
    // $this->sub_menu2_web_branch = '';
    // $this->web_branch_description = '';

    // Product Posting Allowed

    // $this->product_allowed = '';
    // $this->product_code_posting = '';
    // $this->product_desc_posting = '';

    // Product Access Allowed

    // $this->product_access = '';
    // $this->product_code_access = '';
    // $this->product_desc_access = '';

    // Group Restriction

    // $this->group_code_allowed = '';
    // $this->group_code = '';
    // $this->group_descripion = '';

    // GL Restriction/Node GL's

    // $this->gl_allowed_node = '';
    // $this->node_gl_node = '';
    // $this->node_gl_descripion_en_node = '';
    // $this->node_gl_descripion_ar_node = '';

    // GL Restriction/Exceptional Leaf GL

    // $this->gl_allowed_exceptional = '';
    // $this->node_gl_exceptional = '';
    // $this->node_gl_descripion_en_exceptional = '';
    // $this->node_gl_descripion_ar_exceptional = '';
    // $this->exceptional_leaf_gl = '';
    // $this->leaf_gl_description_en_exceptional = '';
    // $this->leaf_gl_description_ar_exceptional = '';

}


}
