@extends('layouts.admin_layout')

@section('title', 'Редактирование пользователя')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя: {{ $employee['first_name'] }}</h1>
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
                        <form action="{{ route('admin.user.update', $employee['id']) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="firstName">Имя</label>
                                    <input
                                        type="text"
                                        value="{{ $employee['first_name'] }}"
                                        name="first_name"
                                        class="form-control"
                                        id="firstName"
                                        placeholder="Введите имя пользователя"
                                        required
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Фамилия</label>
                                    <input
                                        type="text"
                                        value="{{ $employee['last_name'] }}"
                                        name="last_name"
                                        class="form-control"
                                        id="lastName"
                                        placeholder="Введите фамилию пользователя"
                                        required
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="middleName">Отчество</label>
                                    <input
                                        type="text"
                                        value="{{ $employee['middle_name'] }}"
                                        name="middle_name"
                                        class="form-control"
                                        id="middleName"
                                        placeholder="Введите отчество пользователя"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="feature_image">Фото</label>
                                    <img src="{{ $employee['image'] }}" alt="" class="img-uploaded" style="display: block; width: 300px"><br>
                                    <input
                                        type="file"
                                        name="image"
                                        class="form-control"
                                        id="feature_image"
                                        name="feature_image"
                                        value="{{ $employee['image'] }}"
                                        readonly
                                    >
                                    <a href="" class="popup_selector btn btn-primary mt-2" data-inputid="feature_image">Выбрать изображение</a>
                                </div>
                                <div class="form-group">
                                    <label for="subject">Название компании/услуги</label>
                                    <input
                                        type="text"
                                        value="{{ $employee['subject'] }}"
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
                                        type="text"
                                        name="description"
                                        class="form-control"
                                        id="description"
                                        placeholder="Описание"
                                    >{{ $employee['description'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="msisdn">Номер телефона</label>
                                    <input
                                        type="text"
                                        value="{{ $employee['phone_number'] }}"
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
                                        value="{{ $employee['link_to_instagram'] }}"
                                        name="link_to_instagram"
                                        class="form-control"
                                        id="link_to_instagram"
                                        placeholder="Укажите ссылку на Instagram"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="link_to_youtube">YouTube</label>
                                    <input
                                        type="text"
                                        value="{{ $employee['link_to_youtube'] }}"
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
                                        value="{{ $employee['link_to_linkedin'] }}"
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
                                        value="{{ $employee['link_to_telegram'] }}"
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
                                        value="{{ $employee['email'] }}"
                                        name="email"
                                        class="form-control"
                                        id="email"
                                        placeholder="Укажите Email"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="address">Название адреса</label>
                                    <input
                                        type="text"
                                        value="{{ $employee['address'] }}"
                                        name="address"
                                        class="form-control"
                                        id="address"
                                        placeholder="Напишите адрес"
                                    >
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
