<div class="container">

    <div class="col-12 col-md-8 m-auto">

        <form action="{{url('update')}}" class="form-group form p-4" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row align-items-center justify-content-between form-title mb-2 ">
                <h4>
                    Editar evento
                </h4>
                <img src="{{asset('images/favicon.png')}}" alt="WeSports"
                     class="float-left border rounded-lg border-secondary" width="40" height="40">
            </div>
            <div>
                <div class="row my-2 justify-content-center align-items-center">
                    <div class="col-12 col-md-2">
                        <span>Nuevo título </span>
                    </div>
                    <div class="col-12 col-md-10">
                        <input type="text" name="title" class="form-control" value="{{$event['title']}}">
                    </div>
                </div>
                <div class="row my-2 justify-content-center align-items-center">
                    <div class="col-12 col-md-2">
                        <span>Nueva descripción </span>
                    </div>
                    <div class="col-12 col-md-10">
                        <textarea name="description" class="form-control">{{$event['description']}}</textarea>
                    </div>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <hr class="bg-primary">
                <div class="row my-2 justify-content-center align-items-center">
                    <div class="col-12 col-md-2">
                        <span>Nueva dirección </span>
                    </div>
                    <div class="col-12 col-md-10">
                        <input type="text" name="address" placeholder="Dirección" value="{{$event['address']}}"
                               class="form-control">
                    </div>
                </div>
                <div class="row my-2 justify-content-center align-items-center">
                    <div class="col-12 col-md-2">
                        <span>Nueva ciudad </span>
                    </div>
                    <div class="col-12 col-md-10">
                        <input type="text" name="city" placeholder="City" value="{{$event['city']}}"
                               class="form-control">
                    </div>
                </div>
                <hr class="bg-primary">

                <div class="row my-2 justify-content-center align-items-center">
                    <div class="col-12 col-md-2">
                        <span>Nueva fecha </span>
                    </div>
                    <div class="col-12 col-md-10">
                        <input type="datetime-local" name="datetime" value="{{$datetime}}"
                               class="form-control @error('datetime') is-invalid @enderror">
                        @error('datetime')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
                <input value="{{$event['id']}}" name="id" hidden>
                <div class="row my-2 justify-content-center align-items-center">
                    <div class="col-12 col-md-2">
                        <span>Nueva imagen </span>
                    </div>
                    <div class="col-12 col-md-10">
                        <input type="file" name="img" class="form-control @error('img') is-invalid @enderror">
                        @error('img')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                </div>
            </div>
            @if ($message = Session::get('event-failed'))
                <h5 class="alert alert-warning">{{$message}}</h5>
            @endif
            <div class="text-center">
                <input
                    type="submit"
                    value="Actualizar evento"
                    class="btn btn-success p-2 my-2  w-50"
                />
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#createEventButton').hide();
    })
</script>
