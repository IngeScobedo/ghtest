<?php
return function($kirby, $page) {

    
    if ($kirby->request()->is('POST') && get('submit')) {
        
        $alerts = null;
        $token = get('csrf');
        
        if (empty(get('website')) === false || csrf($token) === true) {
            go($page->url());
            exit;
        }

        $data = [
            'name' => esc(get('name')),
            'email' => esc(get('email')),
            'phone' => esc(get('phone')),
            'message' => esc(get('message'))
        ];

        try {
            $kirby->email([
                'template' => 'email',
                'from'     => 'noreply@multiplika.com',
                'to'       => page('contacto')->recipient()->toString(),
                'subject'     => 'Formulario de contacto - Multiplika.com',
                'data'        => $data
            ]);
        } catch (Exception $error) {
            $alerts[] = $error->getMessage();
        }

        if (empty($alerts) === true) {
            $kirby->session()->set([
                'name' => $data['name']
            ]);
            go('success');
        }
    }

    return [
        'alerts' => $alerts ?? null,
        'data'   => $data   ?? false,
    ];
};