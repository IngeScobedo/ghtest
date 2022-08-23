<?php
return function ($kirby, $site, $page) {

    $abbreviation = [
        'Aguascalientes' =>    'Ags.',
        'Baja California' => 'B.C.',
        'Baja California Sur' => 'B.C.S.',
        'Campeche' => 'Camp.',
        'Coahuila' => 'Coah.',
        'Colima' => 'Col.',
        'Chiapas' => 'Chis.',
        'Chihuahua' => 'Chih.',
        'Distrito Federal' => 'D.F.',
        'Durango' => 'Dgo.',
        'Guanajuato' => 'Gto.',
        'Guerrero' => 'Gro.',
        'Hidalgo' => 'Hgo.',
        'Jalisco' => 'Jal.',
        'México' => 'Méx.',
        'Michoacán' => 'Mich.',
        'Morelos' => 'Mor.',
        'Nayarit' => 'Nay.',
        'Nuevo  León' => 'N.L.',
        'Oaxaca' => 'Oax.',
        'Puebla' => 'Pue.',
        'Querétaro' => 'Qro.',
        'Quintana Roo' => 'Q.R.',
        'San Luis Potosí' => 'S.L.P.',
        'Sinaloa' => 'Sin.',
        'Sonora' => 'Son.',
        'Tabasco' => 'Tab.',
        'Tamaulipas' => 'Tams.',
        'Tlaxcala' => 'Tlax.',
        'Veracruz' => 'Ver.',
        'Yucatán' => 'Yuc.',
        'Zacatecas' => 'Zac.'
    ];

    $params = [
        'headers' => [
            'Authorization: Basic ' . base64_encode($site->apiUser() . ':' . $site->apiPassword())
        ]
    ];

    $companies = null;
    try {
        $companies = Remote::get($site->remoteApiUrl() . $page->companiesService(), $params);
        $companies = $companies->json();
        $companies = array_map(function ($c) use ($abbreviation) {
            $location = '';
            if ($c['gcMuniNom']) $location .= $c['gcMuniNom'] . ', ';
            if ($c['gcEstaNom']) {
                $location .= array_key_exists($c['gcEstaNom'], $abbreviation) ? $abbreviation[$c['gcEstaNom']] : $c['gcEstaNom'];
                $location .= ', ';
            }
            if ($c['gcPaisNom']) $location .= $c['gcPaisNom'];
            $c['location'] = $location;
            return $c;
        }, $companies['ttEmprMstr']);
        $companies = array_slice($companies, 0, 4);
    } catch (Exception $e) {
        $companies = [];
    }

    $products = null;

    try {
        $products = Remote::get($site->remoteApiUrl() . $page->productsService(), $params);
        $products = $products->json();
        $products = $products['ttProdVentMstr'];
    } catch (Exception $e) {
        $products = [];
    }

    $categories = null;

    try {
        $categories = Remote::get($site->remoteApiUrl() . '/paxissb/web/system/catalogos/categorias-producto', $params);
        $categories = $categories->json();
        $categories = $categories['ttCateProdMstr'];
    } catch (Exception $e) {
        $categories = [];
    }

    return [
        'companies' => $companies ?? [],
        'products' => $products ?? [],
        'categories' => $categories ?? []
    ];
};
