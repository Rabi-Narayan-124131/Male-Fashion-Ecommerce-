<x-adminheader title="Customers" />
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Our Customers</h4>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Type
                                        </th>
                                        <th>Status</th>
                                        <th>
                                            Registration Date
                                        </th>

                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach ($customers as $customer)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            {{ $customer->name }}
                                        </td>
                                        <td>
                                            {{ $customer->email }}
                                        </td>
                                        <td>
                                            {{ $customer->phone }}
                                        </td>
                                        <td>
                                            <label class="badge badge-info">{{ $customer->user_type }}</label>
                                        </td>
                                        <td><label
                                                class="badge @if($customer->status == 'Active') badge-success @else badge-danger @endif">{{ $customer->status }}</label>
                                        </td>
                                        <td>
                                            {{ $customer->created_at }}
                                        </td>
                                        <td>
                                            @if ($customer->status == 'Active')
                                            <a type="button" class="btn btn-sm btn-inverse-danger"
                                                href="{{ url('userStatus/Blocked',$customer->id) }}"
                                                >Block</a>
                                            @else
                                            <a type="button" class="btn btn-sm btn-inverse-success"
                                                href="{{ url('userStatus/Active',$customer->id) }}"
                                                >Unblock</a>
                                            @endif


                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    <x-adminfooter />
