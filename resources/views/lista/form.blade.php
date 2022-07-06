<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $lista->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description') }}
            {{ Form::text('description', $lista->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('public') }}
            {{ Form::text('public', $lista->public, ['class' => 'form-control' . ($errors->has('public') ? ' is-invalid' : ''), 'placeholder' => 'Public']) }}
            {!! $errors->first('public', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('username') }}
            {{ Form::text('username', $lista->username, ['class' => 'form-control' . ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Username']) }}
            {!! $errors->first('username', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_list_count') }}
            {{ Form::text('user_list_count', $lista->user_list_count, ['class' => 'form-control' . ($errors->has('user_list_count') ? ' is-invalid' : ''), 'placeholder' => 'User List Count']) }}
            {!! $errors->first('user_list_count', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contentId') }}
            {{ Form::text('contentId', $lista->contentId, ['class' => 'form-control' . ($errors->has('contentId') ? ' is-invalid' : ''), 'placeholder' => 'Contentid']) }}
            {!! $errors->first('contentId', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('visible') }}
            {{ Form::text('visible', $lista->visible, ['class' => 'form-control' . ($errors->has('visible') ? ' is-invalid' : ''), 'placeholder' => 'Visible']) }}
            {!! $errors->first('visible', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>