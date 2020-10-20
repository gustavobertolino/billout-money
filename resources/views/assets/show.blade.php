@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($asset->name) ? $asset->name : 'Asset' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('assets.asset.destroy', $asset->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('assets.asset.index') }}" class="btn btn-primary" title="Show All Asset">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('assets.asset.create') }}" class="btn btn-success" title="Create New Asset">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('assets.asset.edit', $asset->id ) }}" class="btn btn-primary" title="Edit Asset">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Asset" onclick="return confirm(&quot;Click Ok to delete Asset.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $asset->name }}</dd>
            <dt>Owner</dt>
            <dd>{{ optional($asset->owner)->id }}</dd>
            <dt>Description</dt>
            <dd>{{ $asset->description }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($asset->is_active) ? 'Yes' : 'No' }}</dd>
            <dt>Value</dt>
            <dd>{{ $asset->value }}</dd>
            <dt>Currency</dt>
            <dd>{{ $asset->currency }}</dd>

        </dl>

    </div>
</div>

@endsection