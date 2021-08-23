<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $movieApp->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $movieApp->description }}</p>
</div>

<!-- Duration Field -->
<div class="col-sm-12">
    {!! Form::label('duration', 'Duration:') !!}
    <p>{{ $movieApp->duration }}</p>
</div>

<!-- Reasedate Field -->
<div class="col-sm-12">
    {!! Form::label('reaseDate', 'Reasedate:') !!}
    <p>{{ $movieApp->reaseDate }}</p>
</div>

<!-- Country Field -->
<div class="col-sm-12">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $movieApp->country }}</p>
</div>

<!-- Genre Field -->
<div class="col-sm-12">
    {!! Form::label('genre', 'Genre:') !!}
    <p>{{ $movieApp->genre }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $movieApp->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $movieApp->updated_at }}</p>
</div>

