{!! Form::model($rpm, [
        'method' => 'PATCH',
        'url' => ['/rpm/edit2', $rpm->Rpm_ID],
        'class' => 'form-horizontal'
    ]) !!}

             {!! Form::hidden('Assn_ID',$Assn_ID) !!}
            
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
    {!! Form::close() !!}