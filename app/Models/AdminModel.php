<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class AdminModel extends Model
{
    use HasFactory;
    use UploadFileTrait;
    const ACTIVE    = 1;
    const INACTIVE  = 0;
    const DRAFT     = -1;
    const REJECTED  = 2;

    static $upload_dir = 'uploads';

   

    public static function setUploadDir( $upload_dir ){
        self::$upload_dir = $upload_dir;
    }
    // Relations
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Methods
    public static function handleSearch($request,$query){
        return $query;
    }
    public static function getItems($request = null,$limit = 20,$table = ''){
        $model = new self;
        $tableName = $model->getTable();
        if($table){
            $modelClass = '\App\Models\\' . $table;
            $query = $modelClass::query(true);
            $query = $modelClass::handleSearch($request,$query);
        }else{
            $query = self::query(true);
        }
        if($request->type && Schema::hasColumn($tableName, 'type')){
            $query->where('type',$request->type);
        }
        if($request->name){
            $query->where('name','LIKE','%'.$request->name.'%');
        }
        if($request->status !== NULL){
            $query->where('status',$request->status);
        }
        $query->orderBy('id','DESC');
        $items = $query->paginate($limit);
        return $items;
    }
    public static function findItem($id,$table = ''){
        if($table){
            $model = '\App\Models\\' . $table;
        }else{
            $model = self::class;
        }
        if (method_exists($model, 'overrideFindItem')) {
            return $model::overrideFindItem($id,$table);
        }
        return $model::findOrFail($id);
    }
    public static function saveItem($request,$table = ''){
        if($table){
            $model = '\App\Models\\' . $table;
        }else{
            $model = self::class;
        }
        $data = $request->except(['_token', '_method','type']);

        if(!$request->slug && $request->name){
            $data['slug'] = Str::slug($request->name);
        }
        if ($request->hasFile('image')) {
            $data['image'] = self::uploadFile($request->file('image'), self::$upload_dir);
        } 

        if (method_exists($model, 'overrideSaveItem')) {
            $item = $model::overrideSaveItem($data,$request);
        } else {
            $item = $model::create($data);
        }
    }
    public static function updateItem($id,$request,$table = ''){
        if($table){
            $model = '\App\Models\\' . $table;
        }else{
            $model = self::class;
        }

        $item = $model::findOrFail($id);
        $data = $request->all();
        $data = $request->except(['_token', '_method','type']);
        if ($request->hasFile('image')) {
            // dd(self::$upload_dir);
            self::deleteFile($item->image);
            $data['image'] = $model::uploadFile($request->file('image'), self::$upload_dir);
        }
        if (method_exists($model, 'overrideUpdateItem')) {
            $item = $model::overrideUpdateItem($id,$data,$request);
        } else {
            $item->update($data);
        }
        
    }
    public static function deleteItem($id,$table = ''){
        if($table){
            $model = '\App\Models\\' . $table;
        }else{
            $model = self::class;
        }
        $item = $model::findItem($id,$table);
        self::deleteFile($item->image);
        return $item->delete();
    }

    // Attributes
    public function getStatusFmAttribute()
{
    switch ($this->status) {
        case self::DRAFT:
            return '<span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">'.__('sys.draft').'</span>';
        case self::ACTIVE:
            return '<span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">'.__('sys.active').'</span>';
        case self::INACTIVE:
            return '<span class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">'.__('sys.inactive').'</span>';
        case self::REJECTED:
            return '<span class="lable-table bg-dark-subtle text-dark rounded border border-dark-subtle font-text2 fw-bold">Từ chối</span>';
    }
}


    // New method for email status
    public function getEmailStatusFmAttribute() {
        switch ($this->email_status) {
            case 0:
                return '<span class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Chưa xác Minh</span>';
            case 1:
                return '<span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Đã Xác Minh</span>';
        }
    }

    public function getVerifyFmAttribute() {
        switch ($this->verify) {
            case 0:
                return '<span class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Không xác nhận</span>';
            case 1:
                return '<span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">xác nhận</span>';
        }
    }

    public function getAllowedFmAttribute() {
        switch ($this->is_allowed_abroad) {
            case 0:
                return '<span class="lable-table bg-warning-subtle text-warning rounded border border-warning-subtle font-text2 fw-bold">Chưa cấp phép</span>';
            case 1:
                return '<span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Cấp phép</span>';
        }
    }
    public function getCreatedAtFmAttribute(){
        return date('d-m-Y',strtotime($this->created_at));
    }
    public function getImageFmAttribute(){
        if( !$this->image ){
            return asset('admin-assets/images/default-image.png');
        }
        return asset($this->image);
    }
}