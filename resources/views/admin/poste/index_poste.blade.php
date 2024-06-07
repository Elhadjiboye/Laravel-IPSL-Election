@extends('layouts.template_admin')

@section('content')
<section class="content-header">
    <h1>
        Gérer les Postes
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nouveau</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <th class="hidden"></th>
                                <th class="text-center">Type Election</th>
                                <th class="text-center">Maximum Vote</th>
                                <th class="text-center">Date Debut</th>
                                <th class="text-center">Date Fin</th>
                                <th class="text-center">Actions</th>

                        </thead>
                        <tbody>
                            @forelse ( $postes as $poste )
                            <tr>
                                <td class='cell text-center'>{{ $poste->type_poste }}</td>
                                <td class='cell text-center'>{{ $poste->max_vote }}</td>
                                <td class='cell text-center'>{{ \Carbon\Carbon::parse($poste->date_debut)->format('Y-m-d H:i') }}</td>
                                <td class='cell text-center'>{{ \Carbon\Carbon::parse($poste->date_fin)->format('Y-m-d H:i') }}</td>


                                    <td class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#editModal{{ $poste->id_poste }}" class="btn btn-success btn-sm btn-flat">
                                            <i class="fa fa-edit"></i> Modifier
                                        </a>


                                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $poste->id_poste }}" class="btn btn-danger btn-sm btn-flat">
                                            <i class="fa fa-trash"></i> Supprimer
                                        </a>
                                    </td>
                            </tr>
                            @empty
                                <tr>
                                    <td class="cell" colspan='5'> Aucune Poste Ajoutées</td>
                                </tr>
                            @endforelse
                        </tbody>
                        @if(session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
    @include('admin.poste.edit_poste')
    @include('admin.poste.create_poste')
    @include('admin.poste.delete_poste')
@endsection
