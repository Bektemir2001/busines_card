@extends('layouts.admin_layout')

@section('title', 'Добавить категорию')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пользователя</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="firstName">Имя</label>
                                    <input
                                        type="text"
                                        name="first_name"
                                        class="form-control"
                                        id="firstName"
                                        placeholder="Введите имя пользователя"
                                        required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Фамилия</label>
                                    <input
                                        type="text"
                                        name="last_name"
                                        class="form-control"
                                        id="lastName"
                                        placeholder="Введите фамилию пользователя"
                                        required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="middleName">Отчество</label>
                                    <input
                                        type="text"
                                        name="middle_name"
                                        class="form-control"
                                        id="middleName"
                                        placeholder="Введите отчество пользователя"
                                    >
                                </div>

                                <div class="form-group">
                                    <label for="feature_image">Фото</label>
                                    <img src="" alt="" class="img-uploaded" style="display: block; width: 300px"><br>
                                    <input
                                        type="file"
                                        class="form-control"
                                        id="feature_image"
                                        name="image"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="subject">Название компании/услуги</label>
                                    <input
                                        type="text"
                                        name="subject"
                                        class="form-control"
                                        id="subject"
                                        placeholder="Введите название"
                                        required
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание компании/услуги</label>
                                        <textarea
                                            name="description"
                                            id="description"
                                            class="form-control"
                                        >
                                        </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="msisdn">Номер телефона</label>
                                    <input
                                        type="text"
                                        name="phone_number"
                                        class="form-control"
                                        id="msisdn"
                                        placeholder="Введите номер телефона"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="link_to_instagram">Instagram</label>
                                    <input
                                        type="text"
                                        name="link_to_instagram"
                                        class="form-control"
                                        id="link_to_instagram"
                                        placeholder="Укажите ссылку на Instagram"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="link_to_facebook">Facebook</label>
                                    <input
                                        type="text"
                                        name="link_to_facebook"
                                        class="form-control"
                                        id="link_to_facebook"
                                        placeholder="Укажите ссылку на Facebook"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="link_to_whatsapp">Whats App</label>
                                    <input
                                        type="text"
                                        name="link_to_whatsapp"
                                        class="form-control"
                                        id="link_to_whatsapp"
                                        placeholder="Укажите ссылку на Whats App"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="link_to_youtube">YouTube</label>
                                    <input
                                        type="text"
                                        name="link_to_youtube"
                                        class="form-control"
                                        id="link_to_youtube"
                                        placeholder="Укажите ссылку на YouTube"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="link_to_linkedin">LinkedIn</label>
                                    <input
                                        type="text"
                                        name="link_to_linkedin"
                                        class="form-control"
                                        id="link_to_linkedin"
                                        placeholder="Укажите ссылку на LinkedIn"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="link_to_telegram">Telegram</label>
                                    <input
                                        type="text"
                                        name="link_to_telegram"
                                        class="form-control"
                                        id="link_to_telegram"
                                        placeholder="Укажите ссылку на Telegram"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input
                                        type="text"
                                        name="email"
                                        class="form-control"
                                        id="email"
                                        placeholder="Укажите Email"
                                        required autofocus oninvalid="this.setCustomValidity('пожалуйста, заполните это поле')" oninput="this.setCustomValidity('')"
                                    >
                                    @error('email')
                                    <p class="text-danger">{{$message}} </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="website">WebSite</label>
                                    <input
                                        type="text"
                                        name="website"
                                        class="form-control"
                                        id="website"
                                        placeholder="Укажите ссылку на WebSite"
                                    >
                                </div>
                                
                                <div class="form-group">
                                    <label for="address">Название адреса</label>
                                    <input
                                        type="text"
                                        name="address"
                                        class="form-control"
                                        id="address"
                                        placeholder="Напишите адрес"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="link_to_map">Адрес</label>
                                    <input
                                        type="text"
                                        name="link_to_map"
                                        class="form-control"
                                        id="link_to_map"
                                        placeholder="Укажите ссылку на карту"
                                    >
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
