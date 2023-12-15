@extends('layouts.app')

@section('content')
    <div class="container mt-5">



        @if(Session::has('status'))
         <div style="text-align: center">
             @if( Session::get('status')==false)

                 <span class="badge rounded-pill bg-danger"> {{Session::get('message')}}</span>


             @elseif(Session::get('status')==true)

                 <span class="badge rounded-pill bg-success">  {{Session::get('message')}}</span>

             @endif

         </div>


        @endif

        <form action="@if(isset($url))
        {{route('dashboard.update.url', $url->id)}}
        @else
        {{route('dashboard.create.url')}}
        @endif
        " method="post">
            @csrf
            @if(isset($url))
                @method('put')
            @endif
            <h2>Shorter URLs</h2>
            <div class="input-group mb-3">
                <input name="url" type="text" class="form-control"
                       value="{{isset($url) ? $url->original_url : ''}}"
                       placeholder="Past your long URL" aria-label="Search" aria-describedby="search-icon">
                <span class="input-group-text" id="search-icon">
            <button type="submit" class="btn btn-sm btn-success">Shorten</button>
        </span>
            </div>
            @error('url')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </form>

        @if(Session::has('status') &&  Session::get('status')==true  &&  Session::has('original_url')&&  Session::has('shortener_url'))

            <div class="alert alert-success" role="alert">
                Short URL: <span id="shortUrl">{{Session::get('shortener_url')}} </span>
                <button class="ms-5 btn btn-sm btn-primary copyButton" data-clipboard-target="#shortUrl">
                    Copy URL
                </button>
            </div>
            <div class="alert alert-primary" role="alert">
                Orginal URL: {{Session::get('original_url')}}
            </div>

        @endif


        <table id="dataTable" class="table table-bordered table-striped">
            <thead class="bg-light text-capitalize">
            <tr>
                <th>Sl</th>
                <th>Orginal Url</th>
                <th>Shortener Url</th>
                <th>Click</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody style="font-size: 12px">
            @foreach ($urls as $url)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $url->original_url }}</td>
                    <td>{{ $url->shortener_url }}</td>
                    <td>
                        {{ $url->click_count }}
                    </td>

                    <td>

                        <a class="btn btn-success btn-sm text-white" title="Edit"
                           href="{{ route('dashboard.edit.url', $url->id) }}">Edit</a>

                        <form action="{{ route('dashboard.delete.url',$url->id ) }}" method="POST"
                              onsubmit="return confirm('{{ 'Are you sure to delete?' }}');"
                              style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger btn-sm text-white" title="Delete" type="submit"> Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $urls->links() }}









    </div>
    <script>

        var clipboard = new Clipboard('.copyButton');
        clipboard.on('success', function (e) {
            // console.log(e);
        });
        clipboard.on('error', function (e) {
            // console.log(e);
        });
    </script>

@endsection
