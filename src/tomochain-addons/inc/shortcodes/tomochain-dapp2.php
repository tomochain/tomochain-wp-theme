<?php
/**
 * List Shortcode
 */
class WPBakeryShortCode_TomoChain_DApp2 extends WPBakeryShortCode {

    public function singleParamHtmlHolder( $param, $value ) {

        $output = '';

        $param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
        $type       = isset( $param['type'] ) ? $param['type'] : '';
        $class      = isset( $param['class'] ) ? $param['class'] : '';

        if ( 'attach_image' === $param['type'] && 'image' === $param_name ) {
            $output       .= '<input type="hidden" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" />';
            $element_icon = $this->settings( 'icon' );
            $img          = wpb_getImageBySize( array(
                'attach_id'  => (int) preg_replace( '/[^\d]/', '', $value ),
                'thumb_size' => 'thumbnail',
                'class'      => 'attachment-thumbnail vc_general vc_element-icon tm-element-icon-none',
            ) );
            $this->setSettings( 'logo',
                ( $img ? $img['thumbnail'] : '<img width="150" height="150" src="' . vc_asset_url( 'vc/blank.gif' ) . '" class="attachment-thumbnail vc_general vc_element-icon lezada-element-icon-banner"  data-name="' . $param_name . '" alt="" title="" style="display: none;" />' ) . '<span class="no_image_image vc_element-icon' . ( ! empty( $element_icon ) ? ' ' . $element_icon : '' ) . ( $img && ! empty( $img['p_img_large'][0] ) ? ' image-exists' : '' ) . '" /><a href="#" class="column_edit_trigger' . ( $img && ! empty( $img['p_img_large'][0] ) ? ' image-exists' : '' ) . '">' . __( 'Add image',
                    'lezada' ) . '</a>' );
            $output .= $this->outputCustomTitle( $this->settings['name'] );
        } elseif ( ! empty( $param['holder'] ) ) {
            if ( 'input' === $param['holder'] ) {
                $output .= '<' . $param['holder'] . ' readonly="true" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '">';
            } elseif ( in_array( $param['holder'],
                array(
                    'img',
                    'iframe',
                ) ) ) {
                $output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" src="' . $value . '">';
            } elseif ( 'hidden' !== $param['holder'] ) {
                $output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">' . $value . '</' . $param['holder'] . '>';
            }
        }

        if ( ! empty( $param['admin_label'] ) && true === $param['admin_label'] ) {
            $output .= '<span class="vc_admin_label admin_label_' . $param['param_name'] . ( empty( $value ) ? ' hidden-label' : '' ) . '"><label>' . $param['heading'] . '</label>: ' . $value . '</span>';
        }

        return $output;
    }

    protected function outputTitle( $title ) {
        return '';
    }

    protected function outputCustomTitle( $title ) {
        return '<h4 class="wpb_element_title">' . $title . ' ' . $this->settings( 'logo' ) . '</h4>';
    }
}
vc_map( array(
    'name'        => esc_html__( 'DApp 2', 'tomochain-addons' ),
    'description' => esc_html__( 'Show information of a DApp', 'tomochain-addons' ),
    'base'        => 'tomochain_dapp2',
    'icon'        => TOMOCHAIN_ADDONS_URI . '/assets/images/icon.png',
    'category'    => esc_html__( 'TomoChain', 'tomochain-addons' ),
    'params'      => array(
        array(
            'type'        => 'attach_image',
            'heading'     => esc_html__( 'Image', 'tomochain-addons' ),
            'param_name'  => 'image',
            'value'       => '',
            'description' => esc_html__( 'Select image from media library . ', 'tomochain-addons' ),
            'save_always' => true,
        ),
        array(
            'type'        => 'vc_link',
            'heading'     => esc_html__( 'URL', 'tomochain-addons' ),
            'param_name'  => 'url',
            'value'       => '',
        ),
        array(
            'type'        => 'vc_link',
            'heading'     => esc_html__( 'Source code URL', 'tomochain-addons' ),
            'param_name'  => 'sourcecode_url',
            'value'       => '',
        ),
        array(
            'type'        => 'textarea_html',
            'heading'     => esc_html__( 'Description', 'tomochain-addons' ),
            'param_name'  => 'description'
        ),
        tomochain_get_param('el_class'),
        tomochain_get_param('css')
    )
));
