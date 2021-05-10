   {!! Form::model($contact, [
    'method' => 'PATCH',
    'route' => ['contact.update', $contact->id],
]) !!} <div class="form-group">
       {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
       <div class="colx">
           {!! Form::text('email', null, ['class' => 'form-control']) !!}
       </div>
   </div>
   <div class="form-group w-45 ">
       {!! Form::label('subject', 'Subject:', ['class' => 'control-label']) !!}
       <div class="colx">
           {!! Form::text('subject', null, ['class' => 'form-control']) !!}
       </div>
   </div>

   <div class="form-group">
       {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
       {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
   </div>

   {!! Form::submit('Update Task', ['class' => 'btn btn-block btn-info text-uppercase text-white']) !!}

   {!! Form::close() !!}
