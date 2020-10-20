@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Assets</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('assets.asset.create') }}" class="btn btn-success" title="Create New Asset">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($assets) == 0)
            <div class="panel-body text-center">
                <h4>No Assets Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Owner</th>
                            <th>Is Active</th>
                            <th>Value</th>
                            <th>Currency</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($assets as $asset)
                        <tr>
                            <td>{{ $asset->name }}</td>
                            <td>{{ optional($asset->owner)->id }}</td>
                            <td>{{ ($asset->is_active) ? 'Yes' : 'No' }}</td>
                            <td>{{ $asset->value }}</td>
                            <td>{{ $asset->currency }}</td>

                            <td>

                                <form method="POST" action="{!! route('assets.asset.destroy', $asset->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('assets.asset.show', $asset->id ) }}" class="btn btn-info" title="Show Asset">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('assets.asset.edit', $asset->id ) }}" class="btn btn-primary" title="Edit Asset">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Asset" onclick="return confirm(&quot;Click Ok to delete Asset.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $assets->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection