@extends('user/template/user-template')

@section('title')
    Cari EO
@stop

@section('active-class-shop')
    current-list-item
@stop

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        {{-- <p>Fresh and Organic</p> --}}
                        <h1>Cari Event Organizer</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <form action="#">
        @csrf
        <div class="select-box">

            <label for="select-box1" class="label select-box1"><span class="label-desc">Lama Acara</span>
            </label>
            <select id="select-box1" class="select">
                <option value="Choice 1">Falkland Islands</option>
                <option value="Choice 2">Germany</option>
                <option value="Choice 3">Neverland</option>
            </select>

        </div>

        <div class="select-box">

            <label for="select-box1" class="label select-box1"><span class="label-desc">Jenis Acara</span>
            </label>
            <select id="select-box1" class="select">
                <option value="Choice 1">Falkland Islands</option>
                <option value="Choice 2">Germany</option>
                <option value="Choice 3">Neverland</option>
            </select>

        </div>

        <div class="select-box">

            <label for="select-box1" class="label select-box1"><span class="label-desc">Jumlah Panitia</span>
            </label>
            <select id="select-box1" class="select">
                <option value="Choice 1">Falkland Islands</option>
                <option value="Choice 2">Germany</option>
                <option value="Choice 3">Neverland</option>
            </select>

        </div>

        <div class="select-box">

            <label for="select-box1" class="label select-box1"><span class="label-desc">Jumlah Peserta</span>
            </label>
            <select id="select-box1" class="select">
                <option value="Choice 1">Falkland Islands</option>
                <option value="Choice 2">Germany</option>
                <option value="Choice 3">Neverland</option>
            </select>

        </div>

        <div class="select-box">

            <label for="select-box1" class="label select-box1"><span class="label-desc">Nama Kota</span>
            </label>
            <select id="select-box1" class="select">
                <option value="Choice 1">Falkland Islands</option>
                <option value="Choice 2">Germany</option>
                <option value="Choice 3">Neverland</option>
            </select>

        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Cari Event Organizer</button>
        </div>
    </form>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro);

        body {
            background: #ffffff;
            color: #414141;
            font: 400 17px/2em 'Source Sans Pro', sans-serif;
        }

        .select-box {
            cursor: pointer;
            position: relative;
            max-width: 20em;
            margin: 5em auto;
            width: 100%;
        }

        .select,
        .label {
            color: #414141;
            display: block;
            font: 400 17px/2em 'Source Sans Pro', sans-serif;
        }

        .select {
            width: 100%;
            position: absolute;
            top: 0;
            padding: 5px 0;
            height: 40px;
            opacity: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            background: none transparent;
            border: 0 none;
        }

        .select-box1 {
            background: #ececec;
        }

        .label {
            position: relative;
            padding: 5px 10px;
            cursor: pointer;
        }

        .open .label::after {
            content: "▲";
        }

        .label::after {
            content: "▼";
            font-size: 12px;
            position: absolute;
            right: 0;
            top: 0;
            padding: 5px 15px;
            border-left: 5px solid #fff;
        }

    </style>

    <script>
        $("select").on("click", function() {

            $(this).parent(".select-box").toggleClass("open");

        });

        $(document).mouseup(function(e) {
            var container = $(".select-box");

            if (container.has(e.target).length === 0) {
                container.removeClass("open");
            }
        });


        $("select").on("change", function() {

            var selection = $(this).find("option:selected").text(),
                labelFor = $(this).attr("id"),
                label = $("[for='" + labelFor + "']");

            label.find(".label-desc").html(selection);

        });
    </script>

@endsection
