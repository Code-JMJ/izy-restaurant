<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol_super_admin = Role::create(['name' => 'Super Admin', 'description_key' => 'superadmin']);
        $rol_admin = Role::create(['name' => 'Admin', 'description_key' => 'admin']);
        $rol_customersupport = Role::create(['name' => 'Customer Support', 'description_key' => 'customersupport']);

        // $permissionGroupRole = PermissionGroup::create(['name' => 'Management Roles', 'description_key' => 'management_roles']);
        // $permissionGroupUser = PermissionGroup::create(['name' => 'Management Users', 'description_key' => 'management_users']);
        // $permissionGroupBranch = PermissionGroup::create(['name' => 'Management Branches', 'description_key' => 'management_branches']);
        // $permissionGroupCustomer = PermissionGroup::create(['name' => 'Management Customers', 'description_key' => 'management_customers']);
        // $permissionGroupService = PermissionGroup::create(['name' => 'Management Services', 'description_key' => 'management_services']);
        // $permissionGroupPlan = PermissionGroup::create(['name' => 'Management Plan', 'description_key' => 'management_plans']);
        // $permissionGroupSubscription = PermissionGroup::create(['name' => 'Management Subscriptions', 'description_key' => 'management_subscriptions']);
        // $permissionGroupPayment = PermissionGroup::create(['name' => 'Management Payments', 'description_key' => 'management_payments']);
        // $permissionGroupReport = PermissionGroup::create(['name' => 'Management Reports', 'description_key' => 'management_reports']);

        // $permission_create_role = Permission::create(['name' => 'create roles', 'description_key' => 'create_role', 'permission_group_id'=>$permissionGroupRole->id]);
        // $permission_view_role = Permission::create(['name' => 'view roles', 'description_key' => 'view_role', 'permission_group_id'=>$permissionGroupRole->id]);
        // $permission_edit_role = Permission::create(['name' => 'edit roles', 'description_key' => 'edit_role', 'permission_group_id'=>$permissionGroupRole->id]);
        // $permission_delete_role = Permission::create(['name' => 'delete roles', 'description_key' => 'delete_role', 'permission_group_id'=>$permissionGroupRole->id]);

        // $permission_create_branch = Permission::create(['name' => 'create branches', 'description_key' => 'create_branch', 'permission_group_id'=>$permissionGroupBranch->id]);
        // $permission_view_branch = Permission::create(['name' => 'view branches', 'description_key' => 'view_branch', 'permission_group_id'=>$permissionGroupBranch->id]);
        // $permission_edit_branch = Permission::create(['name' => 'edit branches', 'description_key' => 'edit_branch', 'permission_group_id'=>$permissionGroupBranch->id]);
        // $permission_delete_branch = Permission::create(['name' => 'delete branches', 'description_key' => 'delete_branch', 'permission_group_id'=>$permissionGroupBranch->id]);

        // $permission_create_user = Permission::create(['name' => 'create users', 'description_key' => 'create_user', 'permission_group_id'=>$permissionGroupUser->id]);
        // $permission_view_user = Permission::create(['name' => 'view users', 'description_key' => 'view_user', 'permission_group_id'=>$permissionGroupUser->id]);
        // $permission_edit_user = Permission::create(['name' => 'edit users', 'description_key' => 'edit_user', 'permission_group_id'=>$permissionGroupUser->id]);
        // $permission_delete_user = Permission::create(['name' => 'delete users', 'description_key' => 'delete_user', 'permission_group_id'=>$permissionGroupUser->id]);

        // $permission_create_customer = Permission::create(['name' => 'create customers', 'description_key' => 'create_customer', 'permission_group_id'=>$permissionGroupCustomer->id]);
        // $permission_view_customer = Permission::create(['name' => 'view customers', 'description_key' => 'view_customer', 'permission_group_id'=>$permissionGroupCustomer->id]);
        // $permission_edit_customer = Permission::create(['name' => 'edit customers', 'description_key' => 'edit_customer', 'permission_group_id'=>$permissionGroupCustomer->id]);
        // $permission_delete_customer = Permission::create(['name' => 'delete customers', 'description_key' => 'delete_customer', 'permission_group_id'=>$permissionGroupCustomer->id]);

        // $permission_create_service = Permission::create(['name' => 'create services', 'description_key' => 'create_service', 'permission_group_id'=>$permissionGroupService->id]);
        // $permission_view_service = Permission::create(['name' => 'view services', 'description_key' => 'view_service', 'permission_group_id'=>$permissionGroupService->id]);
        // $permission_edit_service = Permission::create(['name' => 'edit services', 'description_key' => 'edit_service', 'permission_group_id'=>$permissionGroupService->id]);
        // $permission_delete_service = Permission::create(['name' => 'delete services', 'description_key' => 'delete_service', 'permission_group_id'=>$permissionGroupService->id]);

        // $permission_create_plan = Permission::create(['name' => 'create plans', 'description_key' => 'create_plan', 'permission_group_id'=>$permissionGroupPlan->id]);
        // $permission_view_plan = Permission::create(['name' => 'view plans', 'description_key' => 'view_plan', 'permission_group_id'=>$permissionGroupPlan->id]);
        // $permission_edit_plan = Permission::create(['name' => 'edit plans', 'description_key' => 'edit_plan', 'permission_group_id'=>$permissionGroupPlan->id]);
        // $permission_delete_plan = Permission::create(['name' => 'delete plans', 'description_key' => 'delete_plan', 'permission_group_id'=>$permissionGroupPlan->id]);

        // $permission_view_subscriptions = Permission::create(['name' => 'view subscriptions', 'description_key' => 'view_subscription', 'permission_group_id'=>$permissionGroupSubscription->id]);
        // $permission_process_subscriptions = Permission::create(['name' => 'process subscriptions', 'description_key' => 'process_subscription', 'permission_group_id'=>$permissionGroupSubscription->id]);
        // $permission_cancel_subscriptions = Permission::create(['name' => 'cancel subscriptions', 'description_key' => 'cancel_subscription', 'permission_group_id'=>$permissionGroupSubscription->id]);
        // $permission_migrate_subscriptions = Permission::create(['name' => 'migrate subscriptions', 'description_key' => 'migrate_subscription', 'permission_group_id'=>$permissionGroupSubscription->id]);

        // $permission_view_payment = Permission::create(['name' => 'view payments', 'description_key' => 'view_payments', 'permission_group_id'=>$permissionGroupPayment->id]);
        // $permission_process_payment = Permission::create(['name' => 'process payments', 'description_key' => 'process_payments', 'permission_group_id'=>$permissionGroupPayment->id]);
        // $permission_cancel_payment = Permission::create(['name' => 'cancel payments', 'description_key' => 'cancel_payments', 'permission_group_id'=>$permissionGroupPayment->id]);

        // $permission_distributor_report = Permission::create(['name' => 'distributors report', 'description_key' => 'distributors_report', 'permission_group_id'=>$permissionGroupReport->id]);
        // $permission_plan_report = Permission::create(['name' => 'plans report', 'description_key' => 'plans_report', 'permission_group_id'=>$permissionGroupReport->id]);
        // $permission_sale_report = Permission::create(['name' => 'sales report', 'description_key' => 'sales_report', 'permission_group_id'=>$permissionGroupReport->id]);
        // $permission_commission_report = Permission::create(['name' => 'commissions report', 'description_key' => 'commissions_report', 'permission_group_id'=>$permissionGroupReport->id]);

        // $permission_admin = [
        //     $permission_create_branch, $permission_view_branch, $permission_edit_branch, $permission_delete_branch,
        //     $permission_create_role, $permission_view_role, $permission_edit_role, $permission_delete_role,
        //     $permission_create_user, $permission_view_user, $permission_edit_user, $permission_delete_user,
        //     $permission_create_customer, $permission_view_customer, $permission_edit_customer, $permission_delete_customer,
        //     $permission_create_service, $permission_view_service, $permission_edit_service, $permission_delete_service,
        //     $permission_create_plan, $permission_view_plan, $permission_edit_plan, $permission_delete_plan,
        //     $permission_view_subscriptions, $permission_process_subscriptions, $permission_cancel_subscriptions, $permission_migrate_subscriptions,
        //     $permission_view_payment, $permission_process_payment, $permission_cancel_payment,
        //     $permission_distributor_report, $permission_plan_report, $permission_sale_report, $permission_commission_report
        // ];

        // $permission_distributor = [
        //     $permission_create_customer, $permission_view_customer, $permission_edit_customer, $permission_delete_customer,
        //     $permission_cancel_plan, $permission_migrate_plan, $permission_assign_plan,
        //     $permission_view_payment, $permission_make_payment, $permission_cancel_payment,
        //     $permission_commission_report
        // ];

        // $rol_admin->syncPermissions($permission_admin);
        // $rol_distributor->syncPermissions($permission_distributor);

    }
}
