@extends(backpack_view('blank'))

@section('content')
    @php
        
        $widgets['before_content'][] = [
            'type' => 'jumbotron',
            'heading' => 'Welcome ' . backpack_user()->name . ' !',
            'content' => 'Use the sidebar to the left to create, edit or delete content.',
            'button_link' => backpack_url('user/create'),
            'button_text' => 'Add user',
        ];
        
        $widgets['before_content'][] = [
            'type' => 'div',
            'class' => 'row my-3',
            'content' => [
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'col-sm-2 col-md-3'], // optional
                    'class' => 'card bg-danger text-white', // optional
                    'content' => [
                        'body' =>
                            "<h4> Patients </h4>
                                    <p class='display-3 font-weight-bold'> " .
                            \App\Models\User::role('Patient')->count() .
                            '</p>',
                    ],
                ],
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'col-sm-2 col-md-3'], // optional
                    'class' => 'card bg-secondary text-dark', // optional
                    'content' => [
                        'body' =>
                            "<h4> Doctors </h4>
                                    <p class='display-3 font-weight-bold'> " .
                            \App\Models\User::role('Doctor')->count() .
                            '</p>',
                    ],
                ],
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'col-sm-2 col-md-3'], // optional
                    'class' => 'card bg-warning text-white', // optional
                    'content' => [
                        'body' =>
                            "<h4> Nurses </h4>
                                    <p class='display-3 font-weight-bold'> " .
                            \App\Models\User::role('Nurse')->count() .
                            '</p>',
                    ],
                ],
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'col-sm-2 col-md-3'], // optional
                    'class' => 'card bg-info text-white', // optional
                    'content' => [
                        'body' =>
                            "<h4> Accountants </h4>
                                    <p class='display-3 font-weight-bold'> " .
                            \App\Models\User::role('Accountant')->count() .
                            '</p>',
                    ],
                ],
            ],
        ];
        
        $widgets['before_content'][] = [
            'type' => 'div',
            'class' => 'row my-3',
            'content' => [
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'col-sm-2 col-md-3'], // optional
                    'class' => 'card bg-danger text-white', // optional
                    'content' => [
                        'body' =>
                            "<h4> Departments </h4>
                                    <p class='display-3 font-weight-bold'> " .
                            \App\Models\Dept::count() .
                            '</p>',
                    ],
                ],
                [
                    'type' => 'card',
                    'wrapper' => ['class' => 'col-sm-2 col-md-3'], // optional
                    'class' => 'card bg-secondary text-dark', // optional
                    'content' => [
                        'body' =>
                            "<h4> Appointments </h4>
                                    <p class='display-3 font-weight-bold'> " .
                            \App\Models\App::where('date', now()->toDateString())->count() .
                            '</p>',
                    ],
                ],
            ],
        ];
        
    @endphp
@endsection
