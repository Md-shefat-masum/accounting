<template>
    <div>
        <div class="card">
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Mr Abdul jabbar</td>
                        <td>abs@gmail.com</td>
                        <td>+8801452369</td>
                        <td>
                            <div class="dropdown d-inline-block">
                                <div class="btn-group dropleft text-center">
                                    <a href="#" onclick="return false;" data-toggle="dropdown" role="button" aria-expanded="false" class="btn btn-white dropdown-toggle">
                                        <i aria-hidden="true" class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-danger waves-effect waves-light">Show</a>
                                        <a class="dropdown-item text-danger waves-effect waves-light">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
    .dropleft .dropdown-toggle::before{
        content: unset;
    }
    .form2.right-content .btn:hover, .form2.right-content .btn:focus, .form2.right-content .btn.focus {
        color: #ffffff !important;
        text-decoration: none;
    }
</style>
