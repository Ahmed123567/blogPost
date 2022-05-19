<?php

namespace App\Trait;

use App\Models\Room;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

trait cleanCodeTrait
{

    public function usersDataTables($data)
    {

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = "
                    <a href='http://127.0.0.1:8000/admin/users/$row->id' class='btn btn-primary btn-sm'>View</a>
                    <a href='http://127.0.0.1:8000/admin/users/edit/$row->id'
                     class='edit btn btn-success btn-sm'>Edit</a> 

                     ";
                if ($row->role != 'admin') {

                    $actionBtn = $actionBtn .   "<a onclick='return confirm( \"Are you sure?\" )' href='http://127.0.0.1:8000/admin/users/delete/$row->id' 
                     class='delete btn btn-danger btn-sm'>Delete</a>";

                     $actionBtn = $actionBtn . "<a href='http://127.0.0.1:8000/admin/users/email/$row->id'
                     class='edit btn btn-info btn-sm'>Email</a> ";
                };

               

                return $actionBtn;

                

            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function commentsDataTables($data)
    {

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('owner', function($row){
                
                return $row -> user -> name;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = "
                    <a href='http://127.0.0.1:8000/admin/comments/edit/$row->id'
                     class='edit btn btn-success btn-sm'>Edit</a> 
                     <a href='http://127.0.0.1:8000/admin/comments/delete/$row->id'  onclick='return confirm( \"Are you sure?\" )' class='btn btn-danger btn-sm' > Delete</a>
                     ";
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
    public function postsDataTables($data)
    {

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('owner', function($row){
                
                return $row -> user -> name;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = "
                <a href='http://127.0.0.1:8000/post/$row->id' class='edit btn btn-primary btn-sm'>view</a>

                <a href='http://127.0.0.1:8000/admin/post/edit/$row->id'
                     class='edit btn btn-success btn-sm'>Edit</a> 
                     <a href='http://127.0.0.1:8000/admin/post/delete/$row->id'  onclick='return confirm( \"Are you sure?\" )' class='btn btn-danger btn-sm' > Delete</a>
                
                     
                
                     ";
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
  
  
}

