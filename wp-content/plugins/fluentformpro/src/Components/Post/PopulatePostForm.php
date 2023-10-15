<?php

namespace FluentFormPro\Components\Post;

use FluentForm\Framework\Helpers\ArrayHelper;

/**
 * Populate Post Form on Post Selection Change
 */
class PopulatePostForm
{
    /**
     * Boot Class if post feed has post form type set to update
     */
    public function __construct()
    {
        add_action('fluentformpro_populate_post_form_values', [$this, 'boot'], 10, 3);
        add_action('wp_enqueue_scripts', function () {
            wp_register_script(
                'fluentformpro_post_update',
                FLUENTFORMPRO_DIR_URL . 'public/js/fluentformproPostUpdate.js',
                ['jquery'],
                FLUENTFORMPRO_VERSION,
                true
            );
        });
    }

    public function boot($form, $feed, $postType)
    {
        add_filter('fluentform/form_vars_for_JS', function ($formVars) {
            $formVars['rules']['__ff_update_post_id'] = [
                'required' => [
                    'value'   => true,
                    'message' => __('This field is required', 'fluentformpro')
                ]
            ];

            return $formVars;
        });

        $this->enqueScript($form, $feed, $postType);
        $this->renderPostSelectionField($form, $postType);
    }

    public function enqueScript($form, $feed, $postType)
    {
        $mappedPostField = $feed['post_fields_mapping'];
        $formattedInputs = [];
        foreach ($mappedPostField as $input) {
            $formFieldName = '';

            preg_match('/{+(.*?)}/', $input['form_field'], $matches);

            if (count($matches) > 1) {
                $formFieldName = substr($matches[1], strlen('inputs.'));
            }

            $formattedInputs[$input['post_field']] = $formFieldName;
        }

        wp_enqueue_script('fluentformpro_post_update');
        wp_localize_script('fluentformpro_post_update', 'fluentformpro_post_update_vars', array(
            'mapped_fields' => $formattedInputs,
            'post_selector' => 'post-selector-' . time(),
            'nonce'         => wp_create_nonce('fluentformpro_post_update_nonce'),
        ));
    }

    /**
     * Push Post Selection field in the form
     *
     * @param $form
     * @param $postType
     *
     * @return void
     */
    public function renderPostSelectionField($form, $postType)
    {
        $postSelectionField = new \FluentFormPro\Components\PostSelectionField();
        $data = $postSelectionField->getComponent();
        $data['settings']['label'] = __('Select Post', 'fluentformpro');
        $data['attributes']['id'] = 'post-selector-' . time();
        $data['attributes']['name'] = '__ff_update_post_id';
        $data['settings']['validation_rules']['required'] = [
            'value'   => true,
            'message' => __('This field is required', 'fluentformpro')
        ];
        $data['settings']['post_type_selection'] = $postType;
        $data['enable_select_2'] = 'yes';
        $data['post_extra_query_params'] = 'author=' . get_current_user_id();
        (new \FluentFormPro\Components\PostSelectionField())->render($data, $form);
    }

    /**
     * Get JSON Post Data
     * @return void
     */
    public function getPostDetails()
    {
        \FluentForm\App\Modules\Acl\Acl::verifyNonce('fluentformpro_post_update_nonce');
        $postId = intval($_REQUEST['post_id']);
        if ( ! $postId) {
            wp_send_json([
                'message' => __('Please select a Post', 'fluentformpro')
            ], 423);
        }
        $post = get_post($postId, 'ARRAY_A');
        $selectedData = ArrayHelper::only($post,
            array('post_content', 'post_excerpt', 'post_category', 'tags_input', 'post_title'));
        $selectedData['thumbnail'] = get_the_post_thumbnail_url($postId);
        wp_send_json_success([
            'post' => $selectedData,
        ]);
    }
}