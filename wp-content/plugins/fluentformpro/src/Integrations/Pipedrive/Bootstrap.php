<?php
namespace FluentFormPro\Integrations\Pipedrive;
use FluentForm\Framework\Foundation\Application;
use FluentForm\Framework\Helpers\ArrayHelper;

class Bootstrap extends \FluentForm\App\Services\Integrations\IntegrationManager
{
    public function __construct(Application $app)
    {
        parent::__construct(
            $app,
            'Pipedrive',
            'pipedrive',
            '_fluentform_pipedrive_settings',
            'pipedrive_feed',
            26
        );

        $this->logo = $this->app->url('public/img/integrations/pipedrive.png');

        $this->description = 'By connecting Pipedrive with Fluent Forms, you can connect and organize leads and more.';

        $this->registerAdminHooks();

//        add_filter('fluentform_notifying_async_pipedrive', '__return_false');
        add_filter(
            'fluentform_get_integration_values_pipedrive',
            [$this, 'resolveIntegrationSettings'],
            100,
            3
        );
        add_filter('fluentform_save_integration_value_' . $this->integrationKey, [$this, 'validate'], 10, 3);
    }


    public function getGlobalFields($fields)
    {
        return [
            'logo'               => $this->logo,
            'menu_title'         => __('Pipedrive API Settings', 'fluentformpro'),
            'menu_description'   => __('Pipedrive is a deal-driven customer relationship management CRM solution that also works as an account-management tool with the ability to assist with marketing and the entire sales process. If you don\'t have an Pipedrive account, you can <a href="https://www.pipedrive.com/en/register"  target="_blank">sign up for one here.</a>', 'fluentformpro'),
            'valid_message'      => __('Your Pipedrive API token is valid', 'fluentformpro'),
            'invalid_message'    => __('Your Pipedrive API token is invalid', 'fluentformpro'),
            'save_button_text'   => __('Verify Pipedrive API Token', 'fluentformpro'),
            'config_instruction' => $this->getConfigInstructions(),
            'fields'             => [
                'apiToken' => [
                    'type'        => 'text',
                    'placeholder' => 'Enter Your API token',
                    'label_tips'  => __("Enter your Pipedrive API token, if you do not have follow-up upper instructions.", 'fluentformpro'),
                    'label'       => __('Pipedrive API Token', 'fluentformpro'),
                ],
            ],
            'hide_on_valid'      => true,
            'discard_settings'   => [
                'section_description' => 'Your Pipedrive API integration is up and running',
                'button_text'         => 'Disconnect Pipedrive',
                'data'                => [
                    'apiToken' => ''
                ],
                'show_verify'         => true
            ]
        ];
    }

    public function getGlobalSettings($settings)
    {
        $globalSettings = get_option($this->optionKey);
        if (!$globalSettings) {
            $globalSettings = [];
        }
        $defaults = [
            'apiToken' => '',
            'status'      => ''
        ];

        return wp_parse_args($globalSettings, $defaults);
    }

    public function getIntegrationDefaults($settings, $formId)
    {
        $name = $this->app->request->get('serviceName', '');
        $serviceId = $this->app->request->get('serviceId', '');

        return [
            'name' => $name,
            'list_id' => $serviceId,
            'other_fields' => [
                [
                    'item_value' => '',
                    'label' => ''
                ]
            ],
            'conditionals' => [
                'conditions' => [],
                'status' => false,
                'type' => 'all'
            ],
            'enabled' => true
        ];
    }

    public function pushIntegration($integrations, $formId)
    {
        $integrations[$this->integrationKey] = [
            'title'                 => $this->title . ' Integration',
            'logo'                  => $this->logo,
            'is_active'             => $this->isConfigured(),
            'configure_title'       => 'Configuration required!',
            'global_configure_url'  => admin_url('admin.php?page=fluent_forms_settings#general-pipedrive-settings'),
            'configure_message'     => 'Pipedrive is not configured yet! Please configure your Pipedrive api token first',
            'configure_button_text' => 'Set Pipedrive API Token'
        ];
        return $integrations;
    }

    public function getSettingsFields($settings, $formId)
    {
        $fieldSettings = [
            'fields' => [
                [
                    'key' => 'name',
                    'label' => 'Name',
                    'required' => true,
                    'placeholder' => 'Your Feed Name',
                    'component' => 'text'
                ],
                [
                    'key' => 'list_id',
                    'label' => 'Services',
                    'placeholder' => 'Choose Service',
                    'required' => true,
                    'component' => 'refresh',
                    'options' => $this->getServices()
                ],
            ],
            'button_require_list' => false,
            'integration_title' => $this->title
        ];

        $serviceId = $this->app->request->get(
            'serviceId',
            ArrayHelper::get($settings, 'list_id')
        );

        if ($serviceId) {
            if ($serviceId === 'leads') {
                $fields = $this->getLeadFields();
            } else {
                $fields = $this->getFields($serviceId);
            }

            $fields = array_merge($fieldSettings['fields'], $fields);
            $fieldSettings['fields'] = $fields;
        }

        $fieldSettings['fields'] = array_merge($fieldSettings['fields'], [
            [
                'require_list' => false,
                'key' => 'conditionals',
                'label' => 'Conditional Logics',
                'tips' => 'Allow this integration conditionally based on your submission values',
                'component' => 'conditional_block'
            ],
            [
                'require_list' => false,
                'key' => 'enabled',
                'label' => 'Status',
                'component' => 'checkbox-single',
                'checkbox_label' => 'Enable This feed'
            ]
        ]);

        return $fieldSettings;
    }

    public function saveGlobalSettings($settings){
        if (!$settings['apiToken']) {
            $integrationSettings = [
                'apiToken' => '',
                'status'      => false
            ];
            // Update the  details with access token
            update_option($this->optionKey, $integrationSettings, 'no');
            wp_send_json_error([
                'message'      => __('API token in required.', 'fluentformpro'),
                'status'       => false,
                'require_load' => true
            ], 404);
        }

        try {
            $settings['status'] = false;
            update_option($this->optionKey, $settings, 'no');

            $api = $this->getApi($settings['apiToken']);
            $auth = $api->auth_test();

            if ($auth['success']) {
                $settings['status'] = true;
                update_option($this->optionKey, $settings, 'no');
                wp_send_json_success([
                    'status'  => true,
                    'message' => __('Your settings has been updated!', 'fluentformpro')
                ], 200);
            }
            throw new \Exception(__('Invalid Api Token','fluentformpro'), 401);
        } catch (\Exception $e) {
            wp_send_json_error([
                'status'  => false,
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }

    public function getMergeFields($list, $listId, $formId)
    {
        return [];
    }
    public function resolveIntegrationSettings($settings, $feed, $formId)
    {
        $serviceName = $this->app->request->get('serviceName', '');
        $serviceId = $this->app->request->get('serviceId', '');

        if ($serviceName) {
            $settings['name'] = $serviceName;
        }

        if ($serviceId) {
            $settings['list_id'] = $serviceId;
        }

        return $settings;
    }

    protected function getServices() {
        return [
            'persons'       => 'Person',
            'leads'         => 'Leads',
            'organizations' => 'Organization',
            'deals'         => 'Deal',
            'notes'         => 'Note',
            'activities'    => 'Activity',
        ];
    }

    public function getFields($serviceId) {
        $fieldId = $this->makeFieldEndpoint($serviceId);
        $api = $this->getApi();
        $response = $api->getFields($fieldId);


        // if got error or integration status is false exit with false
        if (is_wp_error($response) || !$response['success']) {
            return false;
        }

        $fields = array();
        if ($response['data']) {
            $others_fields = array();
            foreach ($response['data'] as $field) {
                // if field is not valid skip this field
                if (!$this->isFieldValid($field)) {
                    continue;
                }

                if ($this->filterField($field))  {

                    if ($field['key'] === 'status') {
                        $field['key'] = 'field_status';
                    }
                    if ($field['key'] === 'name') {
                        $field['key'] = 'field_name';
                    }

                    $data = array(
                        'key' => $field['key'],
                        'placeholder' => $field['name'],
                        'label' => $field['name'],
                        'required' => false,
                        'tips' => 'Enter ' . $field['name'] . ' value or choose form input provided by shortcode.',
                        'component' => 'value_text'
                    );

                    if ($field['mandatory_flag'] || $field['key'] === 'content') {
                        $data['required'] = true;
                        $data['tips'] = $field['name'] . ' is a required field. Enter value or choose form input provided by shortcode.';
                    }

                    if ($field['key'] === 'value') {
                        $data['tips'] = 'Amount value. Currency is pipedrive default currency.';
                    }

                    if ($this->isSelectField($field)) {
                        $data['component'] = 'select';
                        $data['tips'] = "Choose " . $field['name'] . " type in select list.";
                        $data_options = array();
                        if ($field['field_type'] === 'user') {
                            $users = $api->getUsers();
                            if (is_wp_error($users) || !$users['success']) {
                                continue;
                            }
                            if ($users['data']) {
                                $data_options = $this->formatArray($users['data']);
                            }
                        } elseif ($field['field_type'] === 'org') {
                            $orgs = $api->getOrganizations();
                            if (is_wp_error($orgs) || !$orgs['success']) {
                                continue;
                            }

                            if ($orgs['data']) {
                                $data_options = $this->formatArray($orgs['data']);
                            }
                        }
                        else {
                            $data_options = $this->formatArray($field['options'], 'options');
                        }

                        $data['options'] = $data_options;
                    }
                    if ($field['field_type'] == 'text') {
                        $data['component'] = 'value_textarea';
                    }

                    array_push($fields, $data);
                } else {
                    if (($field['field_type'] == 'varchar' || $field['field_type'] == 'phone')) {
                        $others_fields[$field['key']] = $field['name'];
                    }
                }

            }
            if (!empty($others_fields)) {
                array_push($fields, [
                    'key' => 'other_fields',
                    'require_list' => false,
                    'required' => false,
                    'label' => 'Other Fields',
                    'tips' => 'Select which Fluent Forms fields pair with their respective pipedrivie modules fields. <br /> Field value must be string type.',
                    'component' => 'dropdown_many_fields',
                    'options' => $others_fields
                ]);
            }
        }

        return $fields;

    }

    protected function getLeadFields() {
        $api = $this->getApi();
        $owners = $orgs = $currencies = [];

        $response = $api->getUsers();
        if (!is_wp_error($response) && $response['success'] && $response['data']) {
            $owners = $this->formatArray($response['data']);
        }

        $response = $api->getOrganizations();
        if (!is_wp_error($response) && $response['success'] && $response['data']) {
            $orgs = $this->formatArray($response['data']);
        }

        $response = $api->getCurrencies();
        if (!is_wp_error($response) && $response['success'] && $response['data']) {
            $currencies = $this->formatArray($response['data'], 'currencies');
        }

        return [
            [
                'key' => 'title',
                'placeholder' => 'The name of the lead. Enter value or choose shortcode',
                'label' => 'Lead Title',
                'required' => true,
                'tips' => 'Enter  value or choose from input provided by shortcode.',
                'component' => 'value_text'
            ],
           [
                'key' => 'owner_id',
                'placeholder' => '',
                'data_type' => 'user',
                'label' => 'Owner',
                'required' => true,
                'tips' => 'Choose Owner from dropdown list.',
                'component' => 'select',
                'options' => $owners
            ],
            [
                'key' => 'organization_id',
                'placeholder' => '',
                'data_type' => 'org',
                'label' => 'Organization',
                'required' => true,
                'tips' => 'Choose Organization from dropdown list.',
                'component' => 'select',
                'options' => $orgs
            ],
            [
                'key' => 'amount',
                'placeholder' => 'Amount value',
                'label' => 'Lead Amount',
                'required' => true,
                'tips' => 'Enter value or choose form input provided by shortcode.',
                'component' => 'value_text'
            ],
            [
                'key' => 'currency',
                'placeholder' => 'Currency',
                'label' => 'Currency Code',
                'required' => true,
                'tips' => 'Choose witch country currency amount value is.',
                'component' => 'select',
                'options' => $currencies
            ],
            [
                'key' => 'expected_close_date',
                'placeholder' => 'Enter Lead Title or choose shortcode',
                'label' => 'Expected Close Date',
                'required' => false,
                'tips' => 'The date of when the deal which will be created from the lead is expected to be closed. In ISO 8601 format: YYYY-MM-DD.',
                'component' => 'datetime'
            ],
            [
                'key' => 'visible_to',
                'placeholder' => 'Visible To',
                'label' => 'Visible To',
                'required' => true,
                'tips' => 'The visibility of the lead. If omitted, the visibility will be set to the default visibility setting of this item type for the authorized user.',
                'component' => 'select',
                'options' => [
                    '1' => 'Owner only',
                    '3' => 'Owner\'s visibility group',
                    '5' => 'Owner\'s visibility group and sub-groups',
                    '7' => 'Entire company',
                ]
            ]
        ];
    }

    protected function formatArray($items = [], $from = '') {
        $newArray = [];
        foreach ($items as $item) {
            if ($from === 'currencies') {
                // make country currencies options for dropdown
                $newArray[$item['code']] = $item['name'];
            } elseif ($from === 'lead_keys') {
                // make leads service keys for validation and get data from feed settings
                $data = [
                    'key' => $item['key'],
                    'feed_key' => $item['key'],
                    'label' => $item['label'],
                    'data_type' => '',
                    'required' => $item['required']
                ];
                if (isset($item['data_type'])) {
                    $data['data_type'] = $item['data_type'];
                }
                array_push($newArray, $data);
            }  elseif ($from === 'options') {
                // format other field options
                $newArray[$item['id']] = $item['label'];
            }
            else {
                // make other select field options
                $newArray[$item['id']] = $item['name'];
            }
        }
        return $newArray;
    }

    public function notify($feed, $formData, $entry, $form)
    {
        $feedData = $feed['processedValues'];
        $list_id = $feedData['list_id'];
        if (!$list_id) {
            return false;
        }
        $keys = $this->getAllKeys($list_id);
        $postData = array();


        foreach ($keys as $key){
            if (isset($key['is_others']) && $key['is_others'] && !empty($feedData['other_fields'])) {
                foreach ($feedData['other_fields'] as $other_field) {
                    if (
                            !empty($other_field['item_value']) &&
                            !empty($other_field['label']) &&
                            $other_field['label'] === $key['feed_key']
                    ) {
                        $postData[$other_field['label']] = $other_field['item_value'];
                    }
                }
                continue;
            }

            if ($key['required'] && empty($feedData[$key['feed_key']])) {
                return false;
            }

            if (!empty($feedData[$key['feed_key']])) {
                $postData[$key['key']] = $feedData[$key['feed_key']];
            }
        }

        if ($list_id === 'leads') {
            $postData['value'] = [
                'amount' => intval(ArrayHelper::get($postData,'amount')),
                'currency' => ArrayHelper::get($postData,'currency')
            ];
            $postData['organization_id'] = intval($postData['organization_id']);
            $postData['owner_id'] = intval($postData['owner_id']);
            ArrayHelper::forget($postData, ['amount', 'currency']);
            $postData['expected_close_date'] = date('Y-m-d', strtotime($postData['expected_close_date']));
        }

        $api = $this->getApi();
        $response = $api->insertServiceData($feedData['list_id'], $postData);

        if (is_wp_error($response)) {
            // it's failed
            do_action('ff_integration_action_result', $feed, 'failed',  'Failed to insert Pipedrive feed. Details : ' . $response->get_error_message());
        } else {
            // It's success
            do_action('ff_integration_action_result', $feed, 'success', 'Pipedrive feed has been successfully inserted '. $list_id .' data.');
        }
    }

    public function validate($settings, $integrationId, $formId)
    {
        $error = false;
        $errors = array();
        $fields = $this->getAllKeys($settings['list_id']);
        if ($fields) {
            foreach ($fields as $field){
                if ($field['required'] && empty($settings[$field['feed_key']])) {
                    $error = true;
                    $msg = __($field['label'].' is required.', 'fluentformpro');
                    if ($field['data_type'] === 'org') {
                        $msg .= __(' First Create Organization In your Integration.');
                    }
                    $errors[$field['feed_key']] = [$msg];
                }
            }
        }

        if ($error){
            wp_send_json_error([
                'message' => __('Validation Failed', 'fluentformpro'),
                'errors'  => $errors
            ], 423);
        }

        return $settings;
    }

    protected function getAllKeys($serviceId)
    {

        if ($serviceId === 'leads') {
            return $this->getLeadKeys();
        }
        $fieldId = $this->makeFieldEndpoint($serviceId);
        $api = $this->getApi();
        $response = $api->getFields($fieldId);

        // if got error or integration status is false exit with false
        if (is_wp_error($response) || !$response['success']) {
            return false;
        }

        $keys = array();
        if ($response['data']) {

            foreach ($response['data'] as $field) {
                // if field is not valid skip this field
                if (!$this->isFieldValid($field)) {
                    continue;
                }
                if ($this->filterField($field))  {
                    $data = array(
                        'key' => $field['key'],
                        'feed_key' => $field['key'],
                        'label' => $field['name'],
                        'data_type' => $field['field_type'],
                        'required' => $field['mandatory_flag']
                    );
                    if ($field['key'] === 'name') {
                        $data['feed_key'] = 'field_name';
                    }
                    if ($field['key'] === 'content') {
                        $data['required'] = true;
                    }
                    if ($field['key'] === 'status') {
                        $data['feed_key'] = 'field_status';
                    }
                    array_push($keys, $data);
                } else {
                    if (($field['field_type'] == 'varchar' || $field['field_type'] == 'phone')) {
                        $data = array(
                            'key' => $field['key'],
                            'feed_key' => $field['key'],
                            'is_others' => true,
                            'label' => $field['name'],
                            'data_type' => $field['field_type'],
                            'required' => $field['mandatory_flag']
                        );
                        array_push($keys, $data);
                    }
                }

            }
        }

        return $keys;
    }

    protected function getLeadKeys()
    {
        $fields = $this->getLeadFields();
        return $this->formatArray($fields, 'lead_keys');
    }

    protected function isFieldValid($field)
    {
        // if bulk edit not set skip this field
        if (!isset($field['bulk_edit_allowed'])) {
            return false;
        }

        // if field data type is data/stage/varchar_options/lead/deal skip this field
        if ( $field['field_type'] === 'date' ||
            $field['field_type'] === 'stage'||
            $field['field_type'] === 'varchar_options' ||
            $field['field_type'] === 'people' ||
            $field['field_type'] === 'lead' ||
            $field['field_type'] === 'deal' ||
            $field['key'] === 'done'
        ) {
            return  false;
        }

        // if field type is select but not property options skit this field
        if (($field['field_type'] === 'enum' || $field['field_type'] === 'visible_to') && !isset($field['options'])) {
            return false;
        }

        return true;
    }
    protected function filterField($field)
    {
        if (
            ($field['mandatory_flag'] && $field['bulk_edit_allowed']) ||
            ($field['bulk_edit_allowed'] &&
                (
                    $field['field_type'] === 'enum' ||
                    $field['field_type'] === 'visible_to' ||
                    $field['field_type'] === 'text' ||
                    $field['field_type'] === 'org' ||
                    $field['key'] === 'value'
                )
            )
        ) {
            return true;
        }
        return false;
    }
    protected function isSelectField($field)
    {
        if (
            (
                (
                    $field['field_type'] === 'enum' ||
                    $field['field_type'] === 'visible_to' ||
                    $field['field_type'] === 'status'
                )
                && $field['options']
            ) ||
            $field['field_type'] === 'user' ||
            $field['field_type'] === 'org'
        ) {
            return true;
        }
        return false;
    }
    protected function makeFieldEndpoint($serviceId)
    {
        if ($serviceId === 'activities') {
            $fieldId = 'activityFields';
        } else {
            $fieldId = substr($serviceId,0,strlen($serviceId) -1) . 'Fields';
        }
        return $fieldId;
    }



    protected function getApi($apiToken = null)
    {
        if (!$apiToken) {
            $apiToken = $this->getGlobalSettings([])['apiToken'];
        }
        return new PipedriveApi($apiToken);
    }

    protected function getConfigInstructions()
    {
        ob_start();
        ?>
        <div>
            <h4>You can get the API token manually from the Pipedrive web app by going to account name (on the top right) > Company settings > Personal preferences > API or by clicking <a href="https://app.pipedrive.com/settings/api"  target="_blank">here</a>.</h4>
        </div>
        <?php
        return ob_get_clean();
    }
}