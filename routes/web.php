<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//*******************************Zone Routes start**************************************//
Route::get('add_zone', 'ZonesController@AddZones');
Route::post('save-zone', 'ZonesController@SaveZone');
Route::get('zones-index', 'ZonesController@ZoneList');
Route::patch('update-zone-details', 'ZonesController@updateZoneDetails');
Route::get('delete-zone', 'ZonesController@DeleteZone')->name('zone.delete');
//*******************************Zone Route End**********************************//

//*******************************Regions Routes start**************************************//
Route::get('add_region', 'RegionsController@AddRegions');
Route::post('save-region', 'RegionsController@SaveRegions');
Route::get('region-index', 'RegionsController@RegionList');
Route::patch('update-region-details', 'RegionsController@updateRegionsDetails');
Route::get('delete-region', 'RegionsController@DeleteRegion')->name('region.delete');
//*******************************Regions Route End**********************************//


//*******************************Nations Routes start**************************************//
Route::get('add_national', 'NationalController@AddNational');
Route::post('save-nation', 'NationalController@SaveNational');
Route::get('nation-index', 'NationalController@NationalList');
Route::patch('update-nation-details', 'NationalController@updateNationalDetails');
Route::get('delete-nation', 'NationalController@DeleteNationality')->name('nation.delete');
//*******************************Nations Route End**********************************//

//********************************************Inventory Controller Start *******************************//
Route::get('inventory/dashboard', 'InventoryController@Dashboard');
Route::get('Add-Customers', 'InventoryController@AddCustomers');
Route::post('save-customer-details', 'InventoryController@SaveCustomerDetails');
Route::get('customers', 'InventoryController@CustomersIndex');
Route::patch('update-customers-details', 'InventoryController@updateCustomersDetails');
Route::get('delete-customer', 'InventoryController@DeleteCustomer')->name('customer.delete');
Route::get('add-category', 'InventoryController@AddCategory');
Route::post('save-category-details', 'InventoryController@SaveCategoryDetails');
Route::get('categories', 'InventoryController@CategoryIndex');
Route::get('delete-category', 'InventoryController@DeleteCategory')->name('category.delete');
Route::patch('update-category-details', 'InventoryController@UpdateCategoryDetails');
Route::get('add-product', 'InventoryController@AddProduct');
Route::post('save-product-details', 'InventoryController@SaveProduct');
Route::get('products', 'InventoryController@ProductIndex');
Route::get('delete-product', 'InventoryController@DeleteProduct')->name('product.delete');
Route::patch('update-product-details', 'InventoryController@UpdateProduct');
Route::get('purchase-orders', 'InventoryController@AddPurchaseOrder');
Route::post('get-product-price', 'InventoryController@GetProductPrice');
Route::get('store-ordertemp-data','InventoryController@migratetemOders');
Route::post('save-order', 'InventoryController@savePurchaseOrderDetails');
Route::post('save-order-temp','InventoryController@savePurchaseOrderDetailsTemp');
Route::get('orders', 'InventoryController@allPurchaseOrders');
Route::patch('update-order-details', 'InventoryController@updateOrderDetails');
Route::post('get-product-price-for-update', 'InventoryController@getProductIdToUpdate');
Route::get('stock-is-running-out', 'InventoryController@getRunningOutProducts');
Route::patch('change-stock-limit', 'InventoryController@updateStockLimit');
//********************************************Inventory Controller ending *******************************//


//*****************************************Pharmacy Controller Start *************************************************
Route::get('pharmacy/dashboard', 'PharmacyController@Dashboard');
Route::get('sales', 'PharmacyController@SalesIndex');
Route::get('sales-form', 'PharmacyController@salesForm');
Route::post('get-items-price', 'PharmacyController@getProductPrice');
Route::post('save-sales', 'PharmacyController@SaveSales');
Route::get('preview-invoice', 'PharmacyController@invoicePreview');
Route::get('drop-sales', 'PharmacyController@dropItem')->name('sales.delete');
Route::get('returns', 'PharmacyController@returnsIndex');
Route::post('check-reference-id', 'PharmacyController@checkRefID');
Route::get('returns-details', 'PharmacyController@returnDetails')->name('returns.refid');
Route::post('save-return-details', 'PharmacyController@savereturns');
//****************************************Pharmacy Controller End ****************************************************
//*****************************************Administrator Controller Start *************************************************
Route::get('admin/dashboard', 'AdminController@Dashboard');
Route::get('roles-index', 'AdminController@RolesIndex');
Route::post('add-roles', 'AdminController@SaveRole');
Route::get('delete-role', 'AdminController@DeleteRole')->name('role.delete');
Route::patch('update-roles-details', 'AdminController@UpdateRolesDetails');
Route::get('list-of-users', 'AdminController@ListAllUsers');
Route::post('register-user', 'AdminController@RegisterUser');
Route::get('reset-password-index', 'AdminController@ResetPasswordIndex');
Route::post('reset-password', 'AdminController@resetPassword');
Route::get('admin/settings', 'AdminController@Settings_index');
Route::post('store-org-details', 'AdminController@storeOrganizationDetails');
Route::get('prescription-list', 'AdminController@PrescriptionList');
Route::get('add-prescription', 'AdminController@addPrescription');
Route::post('preview-prescription', 'AdminController@storePrescription');
Route::get('preview-prescription-to-submit', 'AdminController@PreviewPrescriptionToSubmit');
Route::get('drop-prescription', 'AdminController@dropPrescription')->name('prescription.drop');
Route::get('final-preview-prescription', 'AdminController@finalPrescriptionPreview')->name('preview.prescription');
Route::get('my-notes', 'AdminController@NotesIndex');
Route::post('my-notes-store', 'AdminController@SaveNotes');
Route::patch('my-notes/edit', 'AdminController@UpdateMyNotes');
Route::get('my-appointment-dashboard', 'AdminController@AppointmentDashboard');
Route::get('add-new-appointment', 'AdminController@addNewAppointment');
Route::post('my-appointments', 'AdminController@saveMyAppointment');

//****************************************Administrator Controller End ****************************************************

// Department Routes
Route::get('/department', 'DepartmentController@index')->name('department.index');
Route::get('/department/create', 'DepartmentController@create')->name('department.create');
Route::post('/department', 'DepartmentController@store')->name('department.store');
Route::get('/department/{department}/', 'DepartmentController@show')->name('department.show');
Route::get('/department/{department}/edit', 'DepartmentController@edit')->name('department.edit');
Route::put('/department/{department}', 'DepartmentController@update')->name('department.update');
Route::delete('department/{department}', 'DepartmentController@destroy')->name('department.destroy');
// End of Department Routes

// Lab Request Routes
Route::get('lab-request', 'LabRequestController@create');
Route::post('incoming-request', 'LabRequestController@incomingPatientRequest');
Route::get('lab-request-list', 'LabRequestController@previewLabRequest');
Route::get('confirm-request', 'LabRequestController@confirmSubmissionOfLabRequest')->name('confirm.labrequest');
Route::get('request-list', 'LabRequestController@getLabRequest');
//End Lab Request Routes

// Patient  Routes
Route::get('new-patient', 'ReceptionistController@create');
Route::get('visit', 'ReceptionistController@visitIndex');
Route::post('patient-visit', 'ReceptionistController@store');
Route::post('patient', 'ReceptionistController@store');
Route::get('search-patient', 'ReceptionistController@searchPatient');
Route::post('get-patient', 'ReceptionistController@getPatientId');
Route::post('save-patient-visit-details', 'ReceptionistController@storePatientVisitsDetails');
Route::get('check-appointment-availability', 'ReceptionistController@checkAppointmentIndex');
//End PatientRoutes

// Laboratory Route Start
Route::get('laboratory-dashboard', 'LaboratoryController@dashboard');
Route::get('today-lab-request', 'LaboratoryController@TodaysLabRequest');
Route::get('lab-request-form', 'LaboratoryController@LabRequestFormIndex')->name('lab.request.form');
Route::post('submit-lab-request-result', 'LaboratoryController@storeLabResult');
Route::get('completed', 'LaboratoryController@Completed');
// Laboratory Route end

//Cash and Billing start

Route::get('cash/billing', 'BillingController@dashboard');
Route::get('view-invoice', 'BillingController@ViewInvoice')->name('invoice.view');
Route::post('confirm-bills', 'BillingController@ConfirmBill');
Route::get('reports-dashboards', 'BillingController@ReportDashboard');
Route::post('get-report', 'BillingController@getReport');
//end of cash and billing

//payroll
Route::get('payroll-reports', 'PayrollController@dashboard');
Route::get('overtime-settings', 'PayrollController@OvertimeSettings')->name('overtime.settings');
Route::post('save-overtime-details', 'PayrollController@saveOvertimeDetails');
Route::patch('edit-overtime-details', 'PayrollController@updateOvertimeDetails');
Route::get('overtime', 'PayrollController@overtime');
Route::post('credit-overtime-user', 'PayrollController@CreditOvertimersAccount');
Route::get('deductions', 'PayrollController@indexOfDeduction');
Route::post('deduct-from-user', 'PayrollController@deductions');
Route::get('payments', 'PayrollController@paymentDashboard');
Route::post('credit-user-account', 'PayrollController@creditUserAccount');
Route::post('get-payroll-report', 'PayrollController@gePayrollReport');
//end payroll

//patient
Route::get('patient-dashboard','PatientController@PatientDashboard');
Route::post('make-appointment','PatientController@MakeAppointment');
Route::post('mark-appointment-completed','AdminController@markAppointmentCompleted');
//end patient

//Doctors route start
Route::get('doctors-dashboard','AdminController@DoctorsDashboard');
Route::get('lab-result-list','AdminController@LabResults');


Route::get('finger-print-verify','ReceptionistController@FingerPrintVerifyIndex');
