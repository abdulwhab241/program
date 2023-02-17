<div>
    @if (!empty($successMessage))
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{-- {{ $successMessage }} --}}
        <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;"> {{ $successMessage }}</h4>  </span>
    </div>
@endif
</div>

<button class="btn btn-outline-success btn-sm btn-lg pull-right" wire:click="showformadd" style="margin: 5px; padding: 5px;" type="button">{{ trans('main_trans.Add_Parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
            style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('Parent_trans.Email') }}</th>
            <th>{{ trans('Parent_trans.Name_Father') }}</th>
            <th>{{ trans('Parent_trans.Job_Father') }}</th>
            <th>{{ trans('Parent_trans.Employer') }}</th>
            <th>{{ trans('Parent_trans.Father_Phone') }}</th>
            <th>{{ trans('Parent_trans.Home_Phone') }}</th>
            <th>{{ trans('main_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($my_parents as $my_parent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $my_parent->Email }}</td>
                <td>{{ $my_parent->Name_Father }}</td>
                <td>{{ $my_parent->Job_Father }}</td>
                <td>{{ $my_parent->Employer }}</td>
                <td>{{ $my_parent->Father_Phone }}</td>
                <td>{{ $my_parent->Home_Phone }}</td>
                <td>
                    <button wire:click="edit({{ $my_parent->id }})" title="{{ trans('mian_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $my_parent->id }})" title="{{ trans('mian_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>