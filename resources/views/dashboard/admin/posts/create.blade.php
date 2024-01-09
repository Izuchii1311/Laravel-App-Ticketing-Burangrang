{{-- Include Main Layout Dashboard --}}
@extends('dashboard.layouts.main')

{{-- Give a Title Page --}}
@section('title', "Dashboard | Buat Postingan Baru")

{{-- Content --}}
@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Buat Postingan Baru</h5>
        <div class="mx-4">
            {{-- Include partials Alert --}}
            @include('dashboard.admin.posts.partials.alert')
        </div>

        <form class="card-body" action="{{ route('posts.store') }}" method="post" id="postForm" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-12">
                    <label class="form-label" for="title">Judul Postingan</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Judul Postingan anda..." value="{{ old('title') }}" autocomplete="off" autofocus>
                    @error('title')
                        <div class="invalid-feedback">
                            Judul Postingan wajib diisi dengan benar dan tidak boleh sama.
                        </div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label" for="description">Content Postingan</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Masukan Content Postingan" rows="15">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            Content postingan wajib diisi dengan benar dan tidak boleh sama.
                        </div>
                    @enderror
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn btn-primary me-sm-3 me-1" id="submitButton">Tambah Postingan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                <a href="{{ url()->previous() }}" class="btn text-decoration-none">Kembali</a>
            </div>
        </form>

    </div>
@endsection
{{-- End Content --}}

{{-- Add Script --}}
@push('script')
    <script>
        class MyUploadAdapter {
            constructor( loader ) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
            }

            // Aborts the upload process.
            abort() {
                if ( this.xhr ) {
                    this.xhr.abort();
                }
            }

            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                xhr.open( 'POST', '{{ route('ckeditor.upload') }}', true );
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }

            // Initializes XMLHttpRequest listeners.
            _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;

                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : genericErrorText );
                    }

                    resolve( {
                        default: response.url
                    } );
                } );

                if ( xhr.upload ) {
                    xhr.upload.addEventListener( 'progress', evt => {
                        if ( evt.lengthComputable ) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    } );
                }
            }

            // Prepares the data and sends the request.
            _sendRequest( file ) {
                // Prepare the form data.
                const data = new FormData();

                data.append( 'upload', file );
                // Send the request.
                this.xhr.send( data );
            }
        }

        function uploadPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new MyUploadAdapter( loader );
            };
        }

        ClassicEditor
            .create( document.querySelector( '#description' ), {
                extraPlugins: [ uploadPlugin ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                placeholder: 'Ayo buat konten berita menarik...',
            } )
            .catch( error => {
                console.log( error );
            } );
    </script>
@endpush