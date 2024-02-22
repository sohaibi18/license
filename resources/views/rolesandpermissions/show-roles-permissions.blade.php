<x-layouts.app>
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Basic Bootstrap Table -->

        <div class="container mt-5">

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10%;">Serial No</th>
                    <th style="width: 20%;">Users</th>
                    <th style="width: 20%;">Assigned Roles</th>
                    <th style="width: 20%;">Assigned Permissions</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $serialNumber = 1;
                @endphp
                @foreach($users as $user)
                    <tr>
                        <td>{{ $serialNumber++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{ $role->name }} <br>
                        </td>
                        <td>
                            <ul>
                                @foreach ($role->permissions as $permission)
                                    <li>{{ $permission->name }}</li>
                                @endforeach
                                @endforeach
                            </ul>
                        </td>
                        @endforeach
                    </tr>

                </tbody>
            </table>
            <a href="/assign/roles/permissions/{{$id}}">
                <button type="button" class="btn rounded-pill btn-primary">Assign Role and Permissions</button>
            </a>
            <br>

        </div>
    </div>

</x-layouts.app>
