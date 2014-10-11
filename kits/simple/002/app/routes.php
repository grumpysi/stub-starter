<?php
/**
 * Stub - A PHP Micro Bootstrap Project
 *
 * @package  grumpysi/stub-starter
 * @author   Simon Nicklin <simon@njo.im>
 */

/*
|--------------------------------------------------------------------------
| Add Your Complex Routes Here
|--------------------------------------------------------------------------
|
| You should add simple routes into the routing.yml file.
| This file is for more complicated routes that require arguments or
| loading of channel or structured data.
|
*/

$app->get('faq', function (Silex\Application $app)
{
    // load faq data
    require_once APP_PATH.'/data/faq.php';

    // Render faq template
    return $app['twig']->render('faq.twig', array('faqdata' => $faqdata) );
});

/**
 * Route: sector/{name of the sector}
 * Desc : Display one sector
 */
$app->get('sector/{sectorname}', function (Silex\Application $app, $sectorname) {

    // load sectors data and products
    require_once APP_PATH.'/data/sectors.php';
    require_once APP_PATH.'/data/products.php';

    // if sector name is in array display page else 404
    if ( array_key_exists( $sectorname, $sectorsdata) ) {
        return $app['twig']
            ->render('sector.twig', array(
                'sectordata' => $sectorsdata[$sectorname],
                'productsdata' => $productsdata
            ));
    } else {
        return $app->abort(404, 'The page was not found.');
    }
});

/**
 * Route: products
 * Desc : Display all products
 */
$app->get('products', function () use ($app) {

    // load products data
    require_once APP_PATH.'/data/products.php';

    // Render the products template
    return $app['twig']->render('products.twig', array('productsdata' => $productsdata) );
});

/**
 * Route: product/{name of the product}
 * Desc : Display one product
 */
$app->get('product/{productname}', function (Silex\Application $app, $productname) {

    // load products data
    require_once APP_PATH.'/data/products.php';

    // if product name is in array display page else 404
    if ( array_key_exists( $productname, $productsdata) ) {
        return $app['twig']
            ->render('product.twig', array(
                'productdata' => $productsdata[$productname]
            ));
    } else {
        return $app->abort(404, 'The page was not found.');
    }
});

$app->match('/login', function (Request $request) use ($app) {
    $form = $app['form.factory']->createBuilder('form')
        ->add(
            'username',
            'text',
            array(
                'label' => 'Username',
                'data' => $app['session']->get('_security.last_username')
            )
        )
        ->add('password', 'password', array('label' => 'Password'))
        ->getForm()
    ;

    return $app['twig']->render('login.html.twig', array(
        'form'  => $form->createView(),
        'error' => $app['security.last_error']($request),
    ));
})->bind('login');

$app->post('sendemail', function (Silex\Application $app)
{
    // route to sendemail script
    // This is temporary and needs replacing with a nice form handler
    require_once APP_PATH.'/forms/sendemail.php';
});
