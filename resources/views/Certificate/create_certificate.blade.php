<style>
    .table thead th {
        vertical-align: bottom;
        border: 0px solid #000000;
    }
    .table th, .table td {
        padding: .55rem;
        vertical-align: top;
        border-top: 1px solid #a6a6a6;
    }
</style>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>create Certificate
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div><!--end of page-title-heading -->
            </div><!--end of page-title-wrapper-->
        </div><!--end of page title-->
        <div class="card-body">
            <table class="mb-0 table table-sm">
                <thead>
                    <tr>
                        <th>CODE</th>
                        <th>NAME</th>
                        <th>DESCRIPTION</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0000</td>
                        <td>Shivani</td>
                        <td>This is the new certificate Employee.</td>
                        <td>
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <a href="{{url('edit_certificate')}}"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <i class="fa fa-certificate"></i>
                            <i class="fas fa-edit"></i>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>5678</td>
                        <td>Simran Kaur</td>
                        <td>This is the new certificate.</td>
                        <td>
                            <i class="fa fa-download" aria-hidden="true"></i>
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <i class="fa fa-certificate"></i>
                            <i class="fas fa-edit"></i>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div><!--end of main inner-->
</div>