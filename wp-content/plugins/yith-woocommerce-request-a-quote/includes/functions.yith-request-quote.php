<?php
/**
 * Implements helper functions for YITH Woocommerce Request A Quote
 *
 * @package YITH Woocommerce Request A Quote
 * @since   1.0.0
 * @author  YITH
 */

if ( ! defined( 'ABSPATH' ) || ! defined( 'YITH_YWRAQ_VERSION' ) ) {
	exit; // Exit if accessed directly.
}



if ( ! function_exists( 'yith_ywraq_get_product_meta' ) ) {
	/**
	 * Return the product meta in a variation product
	 *
	 * @param array $raq
	 * @param bool  $echo
	 * @param bool  $show_price
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function yith_ywraq_get_product_meta( $raq, $echo = true, $show_price = true ) {

		$item_data = array();

		// Variation data.
		if ( ! empty( $raq['variation_id'] ) && is_array( $raq['variations'] ) ) {

			foreach ( $raq['variations'] as $name => $value ) {

				if ( '' === $value ) {
					continue;
				}

				$taxonomy = wc_attribute_taxonomy_name( str_replace( 'attribute_pa_', '', urldecode( $name ) ) );

				// If this is a term slug, get the term's nice name.
				if ( taxonomy_exists( $taxonomy ) ) {
					$term = get_term_by( 'slug', $value, $taxonomy );
					if ( ! is_wp_error( $term ) && $term && $term->name ) {
						$value = $term->name;
					}
					$label = wc_attribute_label( $taxonomy );

				} else {
					if ( strpos( $name, 'attribute_' ) !== false ) {
						$custom_att = str_replace( 'attribute_', '', $name );
						if ( '' !== $custom_att ) {
							$label = wc_attribute_label( $custom_att );
						} else {
							$label = apply_filters( 'woocommerce_attribute_label', wc_attribute_label( $name ), $name );
						}
					}
				}

				$item_data[] = array(
					'key'   => $label,
					'value' => $value,
				);

			}
		}

		$item_data = apply_filters( 'ywraq_item_data', $item_data, $raq, $show_price );

		$carrets = apply_filters( 'ywraq_meta_data_carret', "\n" );

		$out = $echo ? $carrets : '';

		// Output flat or in list format.
		if ( count( $item_data ) > 0 ) {
			foreach ( $item_data as $data ) {
				if ( $echo ) {
					$out .= esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['value'] ) . $carrets;
				} else {
					$out .= ' - ' . esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['value'] ) . ' ';
				}
			}
		}

		if ( $echo ) {
			echo wp_kses_post( $out );
		} else {
			return $out;
		}

		return '';
	}
}

if ( ! function_exists( 'yith_ywraq_get_product_meta_from_order_item' ) ) {
	/**
	 * Return the product meta in a varion product
	 *
	 * @param   array $item_meta
	 * @param   bool  $echo
	 *
	 * @return string
	 * @since 1.0.0
	 */
	function yith_ywraq_get_product_meta_from_order_item( $item_meta, $echo = true ) {

		$item_data = array();

		// Variation data.
		if ( ! empty( $item_meta ) ) {

			foreach ( $item_meta as $name => $val ) {

				if ( empty( $val ) ) {
					continue;
				}

				if ( in_array(
					$name,
					apply_filters(
						'woocommerce_hidden_order_itemmeta',
						array(
							'_qty',
							'_tax_class',
							'_product_id',
							'_variation_id',
							'_line_subtotal',
							'_line_subtotal_tax',
							'_line_total',
							'_line_tax',
							'_parent_line_item_id',
							'_commission_id',
							'_woocs_order_rate',
							'_woocs_order_base_currency',
							'_woocs_order_currency_changed_mannualy',
						)
					)
				) ) {
					continue;
				}

				// Skip serialised meta.
				if ( is_serialized( $val[0] ) ) {
					continue;
				}

				$taxonomy = $name;

				// If this is a term slug, get the term's nice name.
				if ( taxonomy_exists( $taxonomy ) ) {
					$term = get_term_by( 'slug', $val[0], $taxonomy );
					if ( ! is_wp_error( $term ) && $term && $term->name ) {
						$value = $term->name;
					} else {
						$value = $val[0];
					}
					$label = wc_attribute_label( $taxonomy );

				} else {
					$label = apply_filters( 'woocommerce_attribute_label', wc_attribute_label( $name ), $name );
					$value = $val[0];
				}

				if ( '' !== $label && '' !== $val[0] ) {
					$item_data[] = array(
						'key'   => $label,
						'value' => $value,
					);
				}
			}
		}

		$item_data = apply_filters( 'ywraq_item_data', $item_data );
		$out       = '';
		// Output flat or in list format.
		if ( count( $item_data ) > 0 ) {
			foreach ( $item_data as $data ) {
				if ( $echo ) {
					echo esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['value'] ) . "\n";
				} else {
					$out .= ' - ' . esc_html( $data['key'] ) . ': ' . wp_kses_post( $data['value'] ) . ' ';
				}
			}
		}

		return $out;

	}
}


if ( ! function_exists( 'yith_ywraq_notice_count' ) ) {
	/**
	 * Get the count of notices added, either for all notices (default) or for one
	 * particular notice type specified by $notice_type.
	 *
	 * @param   string $notice_type  The name of the notice type - either error, success or notice.
	 *
	 * @param   array  $all_notices
	 *
	 * @return int
	 */
	function yith_ywraq_notice_count( $notice_type = '', $all_notices = array() ) {
		$notice_count = 0;

		if ( isset( $all_notices[ $notice_type ] ) ) {
			$notice_count = absint( count( $all_notices[ $notice_type ] ) );
		} elseif ( empty( $notice_type ) ) {
			$notice_count += absint( count( $all_notices ) );
		}

		return $notice_count;
	}
}

if ( ! function_exists( 'yith_ywraq_add_notice' ) ) {
	/**
	 * Add and store a notice
	 *
	 * @since 2.1
	 *
	 * @param string $message The text to display in the notice.
	 * @param string $notice_type The singular name of the notice type - either error, success or notice. [optional]
	 */
	function yith_ywraq_add_notice( $message, $notice_type = 'success' ) {

		$session = YITH_Request_Quote()->session_class;
		if ( ! $session ) {
			return;
		}

		$notices = $session->get( 'yith_ywraq_notices', array() );

		// Backward compatibility
		if ( 'success' === $notice_type ) {
			$message = apply_filters( 'yith_ywraq_add_message', $message );
		}

		$notices[ $notice_type ][] = array(
			'notice' => apply_filters( 'yith_ywraq_add_' . $notice_type, $message ),
		);

		$session->set( 'yith_ywraq_notices', $notices );

	}
}

if ( ! function_exists( 'yith_ywraq_print_notices' ) ) {
	/**
	 * Prints messages and errors which are stored in the session, then clears them.
	 *
	 * @since 2.1
	 */
	function yith_ywraq_print_notices() {

		if ( get_option( 'ywraq_activate_thank_you_page' ) == 'yes' ) {
			return '';
		}

		$session      = YITH_Request_Quote()->session_class;
		$all_notices  = $session->get( 'yith_ywraq_notices', array() );
		$notice_types = apply_filters( 'yith_ywraq_notice_types', array( 'error', 'success', 'notice' ) );

		foreach ( $notice_types as $notice_type ) {
			if ( yith_ywraq_notice_count( $notice_type, $all_notices ) > 0 ) {
				if ( count( $all_notices ) > 0 && $all_notices[ $notice_type ] ) {
					$messages = array();

					foreach ( $all_notices[ $notice_type ] as $notice ) {
						$messages[] = isset( $notice['notice'] ) ? $notice['notice'] : $notice;
					}

					wc_get_template(
						"notices/{$notice_type}.php",
						array(
							'messages' => array_filter( $messages ), // @deprecated 3.9.0
							'notices'  => array_filter( $all_notices[ $notice_type ] ),
						)
					);

				}
			}
		}

		yith_ywraq_clear_notices();
	}
}

if ( ! function_exists( 'yith_ywraq_clear_notices' ) ) {
	/**
	 * Unset all notices
	 *
	 * @since 2.1
	 */
	function yith_ywraq_clear_notices() {
		$session = YITH_Request_Quote()->session_class;
		$session->set( 'yith_ywraq_notices', null );
	}
}


/****** HOOKS *****/
function yith_ywraq_show_button_in_single_page() {
	$general_show_btn = get_option( 'ywraq_show_btn_single_page' );
	if ( 'yes' === $general_show_btn ) {  // check if the product is in exclusion list
		global $product;
		   $hide_quote_button = yit_get_prop( $product, '_ywraq_hide_quote_button', true );

		if ( 1 === $hide_quote_button ) {
			return 'no';
		}
	}

	return $general_show_btn;
}


/**
 * @param $text
 * @param $tag
 * @param $html
 *
 * @return false|string
 */
function yith_ywraq_email_custom_tags( $text, $tag, $html ) {

	if ( 'yith-request-a-quote-list' === $tag ) {
		return yith_ywraq_get_email_template( $html );
	}
}

/**
 * @param $html
 *
 * @return false|string
 */
function yith_ywraq_get_email_template( $html ) {
	$raq_data['raq_content'] = YITH_Request_Quote()->get_raq_return();
	ob_start();
	if ( $html ) {
		wc_get_template(
			'emails/request-quote-table.php',
			array(
				'raq_data' => $raq_data,
			)
		);
	} else {
		wc_get_template(
			'emails/plain/request-quote-table.php',
			array(
				'raq_data' => $raq_data,
			)
		);
	}
	return ob_get_clean();
}


/**
 * @param $action
 * @param $order_id
 * @param $email
 *
 * @return false|string
 */
function ywraq_get_token( $action, $order_id, $email ) {
	return wp_hash( $action . '|' . $order_id . '|' . $email, 'yith-woocommerce-request-a-quote' );
}

/**
 *
 * @param $token string
 * @param $action string
 * @param $order_id integer
 * @param $email integer
 *
 * @return int
 */
function ywraq_verify_token( $token, $action, $order_id, $email ) {
	$expected = wp_hash( $action . '|' . $order_id . '|' . $email, 'yith-woocommerce-request-a-quote' );
	if ( hash_equals( $expected, $token ) ) {
		return 1;
	}
	return 0;
}

/**
 * @return mixed|void
 */
function ywraq_get_browse_list_message() {
	return apply_filters( 'ywraq_product_added_view_browse_list', __( 'Browse the list', 'yith-woocommerce-request-a-quote' ) );
}

if ( ! function_exists( 'ywraq_replace_policy_page_link_placeholders' ) ) {
	/**
	 * Replaces placeholders with links to WooCommerce policy pages.
	 *
	 * @since 1.3.5
	 *
	 * @param string $text Text to find/replace within.
	 *
	 * @return string
	 */
	function ywraq_replace_policy_page_link_placeholders( $text ) {
		return function_exists( 'wc_replace_policy_page_link_placeholders' ) ? wc_replace_policy_page_link_placeholders( $text ) : $text;
	}
}
