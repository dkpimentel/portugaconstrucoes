<?php
/**
 * This file belongs to the YIT Plugin Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @package YITH Woocommerce Request A Quote
 */

?>
<style>
	.section{
		margin-left: -20px;
		margin-right: -20px;
		font-family: "Raleway",san-serif;
	}
	.section h1{
		text-align: center;
		text-transform: uppercase;
		color: #808a97;
		font-size: 35px;
		font-weight: 700;
		line-height: normal;
		display: inline-block;
		width: 100%;
		margin: 50px 0 0;
	}
	.section:nth-child(even){
		background-color: #fff;
	}
	.section:nth-child(odd){
		background-color: #f1f1f1;
	}
	.section .section-title img{
		display: table-cell;
		vertical-align: middle;
		width: auto;
		margin-right: 15px;
	}
	.section h2,
	.section h3 {
		display: inline-block;
		vertical-align: middle;
		padding: 0;
		font-size: 24px;
		font-weight: 700;
		color: #808a97;
		text-transform: uppercase;
	}

	.section .section-title h2{
		display: table-cell;
		vertical-align: middle;
		line-height: 26px;
        border:0;
        background:transparent;
	}

	.section-title{
		display: table;
	}

	.section h3 {
		font-size: 14px;
		line-height: 28px;
		margin-bottom: 0;
		display: block;
	}

	.section p{
		font-size: 13px;
		margin: 25px 0;
	}
	.section ul li{
		margin-bottom: 4px;
	}
	.landing-container{
		max-width: 750px;
		margin-left: auto;
		margin-right: auto;
		padding: 50px 0 30px;
	}
	.landing-container:after{
		display: block;
		clear: both;
		content: '';
	}
	.landing-container .col-1,
	.landing-container .col-2{
		float: left;
		box-sizing: border-box;
		padding: 0 15px;
	}
	.landing-container .col-1 img{
		width: 100%;
	}
	.landing-container .col-1{
		width: 55%;
	}
	.landing-container .col-2{
		width: 45%;
	}
	.premium-cta{
		background-color: #808a97;
		color: #fff;
		border-radius: 6px;
		padding: 20px 15px;
	}
	.premium-cta:after{
		content: '';
		display: block;
		clear: both;
	}
	.premium-cta p{
		margin: 7px 0;
		font-size: 14px;
		font-weight: 500;
		display: inline-block;
		width: 60%;
	}
	.premium-cta a.button{
		border-radius: 6px;
		height: 60px;
		float: right;
		background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/upgrade.png) #ff643f no-repeat 13px 13px;
		border-color: #ff643f;
		box-shadow: none;
		outline: none;
		color: #fff;
		position: relative;
		padding: 9px 50px 9px 70px;
	}
	.premium-cta a.button:hover,
	.premium-cta a.button:active,
	.premium-cta a.button:focus{
		color: #fff;
		background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/upgrade.png) #971d00 no-repeat 13px 13px;
		border-color: #971d00;
		box-shadow: none;
		outline: none;
	}
	.premium-cta a.button:focus{
		top: 1px;
	}
	.premium-cta a.button span{
		line-height: 13px;
	}
	.premium-cta a.button .highlight{
		display: block;
		font-size: 20px;
		font-weight: 700;
		line-height: 20px;
	}
	.premium-cta .highlight{
		text-transform: uppercase;
		background: none;
		font-weight: 800;
		color: #fff;
	}

	@media (max-width: 768px) {
		.section{margin: 0}
		.premium-cta p{
			width: 100%;
		}
		.premium-cta{
			text-align: center;
		}
		.premium-cta a.button{
			float: none;
		}
	}

	@media (max-width: 480px){
		.wrap{
			margin-right: 0;
		}
		.section{
			margin: 0;
		}
		.landing-container .col-1,
		.landing-container .col-2{
			width: 100%;
			padding: 0 15px;
		}
		.section-odd .col-1 {
			float: left;
			margin-right: -100%;
		}
		.section-odd .col-2 {
			float: right;
			margin-top: 65%;
		}
	}

	@media (max-width: 320px){
		.premium-cta a.button{
			padding: 9px 20px 9px 70px;
		}

		.section .section-title img{
			display: none;
		}
	}
</style>
<div class="landing">
	<div class="section section-cta section-odd">
		<div class="landing-container">
			<div class="premium-cta">
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Upgrade to %1$spremium version%2$s of %1$sYITH WooCommerce Request a Quote%2$s to benefit from all features!', 'yith-woocommerce-request-a-quote' ) ), '<span class="highlight">', '</span>' );
					?>
				</p>
				<a href="<?php echo esc_url( YITH_YWRAQ_Admin()->get_premium_landing_uri() ); ?>" target="_blank" class="premium-cta-button button btn">
					<span class="highlight"><?php esc_html_e( 'UPGRADE', 'yith-woocommerce-request-a-quote' ); ?></span>
					<span><?php esc_html_e( 'to the premium version', 'yith-woocommerce-request-a-quote' ); ?></span>
				</a>
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/01-bg.png) no-repeat #fff; background-position: 85% 75%">
		<h1><?PHP esc_html_e( 'Premium Features', 'yith-woocommerce-request-a-quote' ); ?></h1>
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/01.png" alt="CUSTOMISED BUTTON" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/01-icon.png" alt="icon CUSTOMISED BUTTON"/>
					<h2><?PHP esc_html_e( 'CUSTOMISED BUTTON', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Choose the style you prefer for your %1$s"Add to Quote"%2$s button! In the plugin option panel users will be able to find a section to set colours and text for the button', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/02-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/02-icon.png" alt="icon 02" />
					<h2><?php esc_html_e( 'NOT JUST IN PRODUCT PAGE', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Give users the opportunity to add one or more products to their list for a quote request from many different pages in your shop, and %1$snot just from product detail page%2$s. Enable this option and the button will be shown also in other pages of your store.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
					</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/02.png" alt="show button in different pages" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/03-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/03.png" alt="HIDE PRODUCT PRICE" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/03-icon.png" alt="icon 03" />
					<h2><?php esc_html_e( 'HIDE PRODUCT PRICE', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p><?php esc_html_e( 'Suppose that you do not want to show price for products in your shop. Just a click and your wish comes true. Enable the option "Hide Price" and it\'s done!', 'yith-woocommerce-request-a-quote' ); ?></p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/04-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/04-icon.png" alt="icon 04" />
					<h2><?php esc_html_e( 'EXCLUSION TABLE', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'A dedicated list where you can add those products that have to be excluded from quote requests. Enable the specific option and "Add to Quote" button will %snot be displayed%s for products in this table.%3$sAnd if you have to remove all products in a %1$scategory%2$s or %1$stag%2$s, you can do this with one click and the exclusion will apply also to all products you will add later.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>', '<br>' );
					?>
					</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/04.png" alt="exclusion table" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/05-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/05.png" alt="User filters" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/05-icon.png" alt="icon 05" />
					<h2><?php esc_html_e( 'USER FILTERS', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'A specific option allows you to filter users to which applying plugin features. You can choose among %1$sregistered%2$s users, %1$sunregistered%2$s ones or let the plugin work for all of them without making any distinction. ', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
					</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/06-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/06-icon.png" alt="icon 06" />
					<h2><?php esc_html_e( 'REQUEST FORM', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags */
					echo sprintf( wp_kses_post(
							__(
								'The plugin includes an advanced default form. Thanks to it, you can %1$scustomize%2$s it and add %1$sas many fields as you wish%2$s. Add a date or picker, an upload field, checkboxes or radio buttons, select or multi selects, text, heading, state and country fields. Feel free to compose it as you prefer.
 Yet, if you’re already using %1$s"Contact Form 7", "Gravity Form"%2$s or %1$s"YITH Contact Form"%2$s, feel free to build your form with those, as they are all supported.',
								'yith-woocommerce-request-a-quote'
							)
						),
						'<b>',
						'</b>',
						'<br>'
					);
					?>
					</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/06.png" alt="request form" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/07-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/07.png" alt="request management" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/07-icon.png" alt="Icon 07" />
					<h2><?php esc_html_e( 'REQUEST MANAGEMENT', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Every request you get is treated like an order! Yes, that\'s it. As soon as a user sends a quote request, you will see it in WooCommerce "Orders" section. %1$sMany details for each request%2$s, from current status to the username that generated it. A rich page specifically created to have everything there and at a hand\'s grasp.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/08-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/08-icon.png" alt="icon 08" />
					<h2><?php esc_html_e( 'SEND THE QUOTE', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'The best of interaction with your users. They send their request and you can answer so simply, just need to access your admin panel. A few steps to send the right proposal that %1$spersuades%2$s your customer to purchase.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
					</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/08.png" alt="send the quote" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/09-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/09.png" alt="accept" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/09-icon.png" alt="icon 09" />
					<h2><?php esc_html_e( 'ACCEPT OR REJECT?', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Users can decide whether to %1$saccept%2$s or %1$sreject%2$s your quote proposal directly from the email they\'ve got. Two simple choice options, that show professionalism and that your users will certainly appreciate. In case they accept, they will be redirected to the order checkout.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>

	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/10-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/10-icon.png" alt="icon 10" />
					<h2><?php esc_html_e( 'A QUOTE WITH EXPIRATION', 'yith-woocommerce-request-a-quote' ); ?> </h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'You made a good offer, one that cannot be rejected, and you want to urge your customer to purchase by %1$ssetting an expiration date for the proposal you are offering?%2$s Add the expiration date directly from the request page while you are writing your undeniable proposal.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/10.png" alt="quote expiration" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/12-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/12.png" alt="PDF Attachment" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/12-icon.png" alt="icon 12" />
					<h2><?php esc_html_e( 'Widgets', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
				<p>
				<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Two widgets, different for style, allow you to show to users the %1$scomplete list of products%2$s they selected to request the quote to send to site administrator.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
				?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/13-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/13-icon.png" alt="icon 13" />
					<h2><?php esc_html_e( 'Send PDF attachment', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
				<?php esc_html_e( 'Choose the best form to send your quote offer: send the quote and the list of selected products either in the email body, or as PDF attachment or both of them. Everyone with their own style and needs.', 'yith-woocommerce-request-a-quote' ); ?>
				</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/13.png" alt="Widget" />
			</div>
		</div>
	</div>



	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/11-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/11.png" alt="recent request" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/11-icon.png" alt="icon 13" />
					<h2><?php esc_html_e( 'Recent requests in "My Account"', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'All users registered in your store can see all quote requests they have sent from %1$s"My Account"%2$s page and check details, included the current status for them.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/13b-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/13b-icon.png" alt="icon 13" />
					<h2><?php esc_html_e( 'LOGO, SENDER AND FOOTER IN PDF', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
				<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'To add a %1$scustom text%2$s with the most appropriate and useful information.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
				?>
				</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/13b.png" alt="Pdf footer" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/14-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/14.png" alt="PDF Paging" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/14-icon.png" alt="icon 14" />
					<h2><?php esc_html_e( 'PDF PAGING', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'By activating %1$sPDF Paging%2$s, customers do not have to scroll the page repeatedly. Thanks to PDF wide contents they can carefully read your offer.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/15-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/15-icon.png" alt="icon 15" />
					<h2><?php esc_html_e( 'ADDITIONAL COSTS', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
				<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'It\'s easy to add %1$sadditional and shipping costs%2$s and create a quote as accurate as possible.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
				?>
				</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/15.png" alt="ADDITIONAL COSTS" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/16-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/16.png" alt="PRICE CHANGE" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/16-icon.png" alt="icon 16" />
					<h2><?php esc_html_e( 'PRICE CHANGE', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Special customers deserve special prices! This plugin allows to %1$schange prices in the quote%2$s without altering prices in the shop.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/25-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/25-icon.png" />
					<h2><?php esc_html_e( 'Edit the shipping and billing addresses', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'You can edit the users\' shipping and billing addresses while creating the quote. This is useful, for example, if your users wish to receive the order at a different address rather than the one available on their profile.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'And that\'s not all! You can also prevent the users from editing the checkout fields and avoid changes of the data previously inserted.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/25.png" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/26-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/26.png" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/26-icon.png" />
					<h2><?php esc_html_e( 'Prevent changes to shipping method ', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Enrich your proposal by adding shipping fees. You can optionally choose whether to let users select or not a %1$sshipping method different from the one specified in the quote%2$s during the checkout process. ', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/17-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/17-icon.png" alt="icon 17" />
					<h2><?php esc_html_e( 'PDF DOWNLOAD', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
				<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'PDF can be downloaded at any time in %1$s"My Account"%2$s page. Certainly useful for those customers who lost the quote attached to your email.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
				?>
				</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/17.png" alt="PDF DOWNLOAD" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/18-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/18.png" alt="EMAIL ATTACHMENT" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/18-icon.png" alt="icon 18" />
					<h2><?php esc_html_e( 'EMAIL ATTACHMENT', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'With this Premium Version plugin, any file can be attached to emails. %1$sQuotes will be richer!%2$s', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/19-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/19-icon.png" alt="icon 19" />
					<h2><?php esc_html_e( 'OUT OF STOCK PRODUCTS', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
				<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Want to show the Quote button %1$sautomatically when a product goes Out-of-stock%2$s? No problem, it’s possible! And there’s more to add: you can choose whether to show the Quote button only on out of stock products or also on products in stock with a simple click.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
				?>
				</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/19.png" alt="OUT OF STOCK PRODUCTS" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/18-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/20.png" alt="ACCOUNT REGISTRATION" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/20-icon.png" alt="icon 20" />
					<h2><?php esc_html_e( 'ACCOUNT REGISTRATION', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'A new feature for your e-commerce. New users requesting a quote have the possibility to %1$sregister an account%2$s in the shop', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/21-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/21-icon.png" alt="icon 21" />
					<h2><?php esc_html_e( 'REQUEST SENDING CONFIRMATION', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
				<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Choose the action to make soon after users send the request: %1$snotify%2$s them of the successful outcome or %1$sredirect%2$s them to the specific page that your marketing strategy provides.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
				?>
				</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/21.png" alt="OUT OF STOCK PRODUCTS" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/22-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/22.png" alt="ACCOUNT REGISTRATION" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/22-icon.png" alt="icon 20" />
					<h2><?php esc_html_e( 'QUICK CHECKOUT', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'You made the proposal to the user who decides to accept it. What happens now? %1$sThe most logical thing!%2$s The user is redirected to the checkout page to complete the order according to the quote received. Easy and fast.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/21-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/23-icon.png" alt="icon 23" />
					<h2><?php esc_html_e( 'CREATE THE QUOTES IN AN AUTOMATIC WAY', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
				<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'You may constantly receive quote requests to which you cannot reply in a fast way. This means losing possible customers every day.%3$s Never fear! Our %1$sYITH WooCommerce Request a Quote allows you to create and send automatic replies to users%2$s, including a quote calculated on the original price of the products. %3$sThe perfect solution if your users don\'t know the prices if you have decided to hide them. ', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>', '<br>' );
				?>
				</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/21.png" alt="OUT OF STOCK PRODUCTS" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/24-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/24.png" alt="Create quote by admin" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/24-icon.png" alt="icon 24" />
					<h2><?php esc_html_e( 'Create quote by admin', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php esc_html_e( 'Do you want to send a tempting offer to your customers? Today, with YITH WooCommerce Request a Quote, that\'s easy!', 'yith-woocommerce-request-a-quote' ); ?>
				</p>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo wp_kses_post( sprintf( __( 'In a few steps, you can %1$screate a new quote from the backend%2$s of your website and forward it to the email address you entered: users will receive the quote for the list of products they have chosen and will be able to decide whether they want to %1$saccept%2$s or %1$srefuse%2$s the special offer you designed for them.', 'yith-woocommerce-request-a-quote' ) , '<b>','</b>' ) ) ;
					?>
				</p>
				<p>
					<?php esc_html_e( 'Today your store has a new edge!', 'yith-woocommerce-request-a-quote' ); ?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-odd clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/29-bg.png) no-repeat #f1f1f1; background-position: 15% 100%">
		<div class="landing-container">
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/29-icon.png" alt="icon 29" />
					<h2><?php esc_html_e( 'Match WooCommerce checkout fields', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'If you %1$smatch the form fields with WooCommerce standard information%2$s, you can have them automatically filled in the quote request you receive on backend and in the checkout for users, so they don’t have to add their details once again.', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'And there\'s more: enable the %1$sauto-complete option%2$s and they will automatically see their own details filled in if they are logged in', 'yith-woocommerce-request-a-quote' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/29.png" alt="" />
			</div>
		</div>
	</div>
	<div class="section section-even clear" style="background: url(<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/30-bg.png) no-repeat #fff; background-position: 85% 100%">
		<div class="landing-container">
			<div class="col-1">
				<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/30.png" alt="Create quote by admin" />
			</div>
			<div class="col-2">
				<div class="section-title">
					<img src="<?php echo esc_url( YITH_YWRAQ_URL ); ?>assets/images/30-icon.png" alt="icon 30" />
					<h2><?php esc_html_e( 'Show request a quote button on checkout page', 'yith-woocommerce-request-a-quote' ); ?></h2>
				</div>
				<p>
					<?php esc_html_e( 'Customer will be able to change his cart into a quote request', 'yith-woocommerce-request-a-quote' ); ?>
				</p>
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'With a simple click on the "Request a Quote" button on the checkout page, your customer can submit their complete cart as a quote request.' ) ), '<b>', '</b>' );
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="section section-cta section-odd">
		<div class="landing-container">
			<div class="premium-cta">
				<p>
					<?php
					/* translators: placeholders html tags  */
					echo sprintf( wp_kses_post( __( 'Upgrade to %1$spremium version%2$s of %1$sYITH WooCommerce Request a Quote%2$s to benefit from all features!', 'yith-woocommerce-request-a-quote' ) ), '<span class="highlight">', '</span>' );
					?>
				</p>
				<a href="<?php echo esc_url( YITH_YWRAQ_Admin()->get_premium_landing_uri() ); ?>" target="_blank" class="premium-cta-button button btn">
					<span class="highlight"><?php esc_html_e( 'UPGRADE', 'yith-woocommerce-request-a-quote' ); ?></span>
					<span><?php esc_html_e( 'to the premium version', 'yith-woocommerce-request-a-quote' ); ?></span>
				</a>
			</div>
		</div>
	</div>
</div>
