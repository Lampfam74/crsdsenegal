<?php
$options = sopot_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );


//Main Logo 


$dark_logo = $options->get( 'dark_logo' );
$dark_logo_dimension = $options->get( 'dark_logo_dimension' );

//Sticky Logo

$light_logo = $options->get( 'light_logo' );
$light_logo_dimension = $options->get( 'light_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>


<header class="main-header main-header-two clearfix">
    <nav class="main-menu main-menu-two clearfix">
        <div class="container clearfix">
            <div class="main-menu-wrapper clearfix">
                <div class="main-menu-wrapper__left">
                    <div class="main-menu-wrapper__logo">
                        <?php echo sopot_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>
                    </div>
                </div>
                <div class="main-menu-wrapper__right">
                    <div class="main-menu-wrapper__main-menu">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                'container_class'=>'navbar-collapse collapse navbar-right',
                                'menu_class'=>'nav navbar-nav',
                                'fallback_cb'=>false, 
                                'items_wrap' => '%3$s', 
                                'container'=>false,
                                'depth'=>'3',
                                'walker'=> new Bootstrap_walker()  
                            ) ); ?>
                        </ul>
                    </div>
                    <?php if( $options->get( 'btn_title2' ) ):?>
                    <a href="<?php echo esc_attr($options->get('btn_link2'), true); ?>" class="thm-btn main-header__btn"><?php echo wp_kses($options->get('btn_title2'), true); ?></a><?php endif ?>
                </div>
            </div>
        </div>
    </nav>
</header>

        





        <?php if($options->get('show_sticky_header')){ ?>
        <div class="stricky-header stricked-menu main-menu main-menu-two">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->
        <?php } ?>





        <div class="mobile-nav__wrapper">
            <div class="mobile-nav__overlay mobile-nav__toggler"></div>
            <div class="mobile-nav__content">
                <span class="mobile-nav__close mobile-nav__toggler">
                    <i class="icon-plus"></i>
                </span>
                <div class="logo-box">
                <?php echo sopot_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>
                </div>
                <div class="mobile-nav__container"></div>
                <ul class="mobile-nav__contact list-unstyled">
                    <?php if($options->get('mobile_email')){ ?>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:<?php echo wp_kses($options->get('mobile_email'), true); ?>"><?php echo wp_kses($options->get('mobile_email'), true); ?></a>
                    </li>
                    <?php } ?>
                    <?php if($options->get('mobile_phone_no')){ ?>
                    <li>
                        <i class="fa fa-phone-alt"></i>
                        <a href="tel:<?php echo wp_kses($options->get('mobile_phone_no'), true); ?>"><?php echo wp_kses($options->get('mobile_phone_no'), true); ?></a>
                    </li>
                    <?php } ?>
                </ul>
                <?php if($options->get('mobile_social_icons')){ ?>
                <div class="mobile-nav__social">
                    <?php echo wp_kses($options->get('mobile_social_icons'), true); ?>
                </div>
                <?php } ?>
            </div>
        </div>








