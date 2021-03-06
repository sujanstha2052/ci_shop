<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Store_item;
use App\Models\StoreItemModel;
use App\Models\StoreItemSizeModel;
use App\Models\StoreItemColourModel;


    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // @todo :- need to create medium Image for description Image
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===
    // === === === === === === === === === === === === === === === ===


class Store_items extends BaseController
{
    public function manage()
    {
        $model = new StoreItemModel();
        $data = [
            'page_title' => 'Manage Category',
            'store_items' => $model->paginate(2),
            'pager' => $model->pager
        ];
        return view('admin/store_items/manage', $data);
    }

    public function create()
    {
        if (!empty($_POST)) {
            $store_item = new Store_item($this->request->getPost());
            $model = new StoreItemModel();

            if ($model->insert($store_item)) {
                return redirect()->to('/admin/store_items/edit/' . $model->insertID)
                ->with('success', 'Store Items Created Successfully!!');
            } else {
                return redirect()->back()
                ->withInput()
                ->with('error', $model->errors());
            }
        }

        $data['page_title'] = "Create Store Item";
        return view('admin/store_items/create', $data);
    }

    public function edit($id = null)
    {
        $model = new StoreItemModel();
        $store_item = $model->find($id);

        if (!empty($_POST)) {
            $store_item_data = new Store_item($this->request->getPost());
            if ($model->update($id, $store_item_data)) {
                return redirect()->to('/admin/store_items/edit/' . $id)
                ->with('success', 'Store Items Updated Successfully!!');
            } else {
                return redirect()->back()
                ->withInput()
                ->with('error', $model->errors());
            }
        }

        $data['page_title'] = "Update Store Item";
        $data['store_item'] = $store_item;
        $data['store_item_id'] = $store_item->id;
        return view('admin/store_items/edit', $data);
    }

    public function delete($id = null)
    {
        $model = new StoreItemModel();
        $this->delete_image($id);
        $model->delete($id, false);
        $store_item_colour_model = new StoreItemColourModel();
        $store_item_colour_model->deleteByItemId($id);

        $store_item_size_model = new StoreItemSizeModel();
        $store_item_size_model->deleteByItemId($id);
        return redirect()->to('/admin/store_items/manage')
        ->with('success', 'Item Deleted Succssfully!!');
    }

    public function upload_image($id = null)
    {
        if (!empty($_FILES)) {
            $file = $this->request->getFile('item_image');
            if (!$file->isValid()) {
                $error_code = $file->getError();
                if ($error_code == UPLOAD_ERR_NO_FILE) {
                    return redirect()->back()
                    ->with('warning', 'No File Selected!!');
                }
            }

            $size = $file->getSizeByUnit('mb');

            if ($size > 5) {
                return redirect()->back()
                ->with('warning', 'File too large (max 5MB)');
            }

            $type = $file->getMimeType();

            if (!in_array($type, ['image/png', 'image/jpeg'])) {
                return redirect()->back()
                ->with('warning', 'Invalid file format (PNG or JPEG only)');
            }

            $path = $file->store('store_items/big_pic');

            $path = WRITEPATH . 'uploads/' . $path;
            $fileName = $file->getName();
            $small_pic_path = WRITEPATH . 'uploads/store_items/small_pic/' . $fileName;

            service('image')
            ->withFile($path)
            ->fit(200, 200, 'bottom')
            ->save($small_pic_path);

            $model = new StoreItemModel();
            $store_item = $model->find($id);
            $store_item->big_pic = $fileName;
            $store_item->small_pic = $fileName;

            $model->protect(false)->save($store_item);

            return redirect()->to('/admin/store_items/edit/' . $id)
            ->with('info', 'Image Uploaded Successfully!!');
        }

        $data['page_title'] = "Uploda Item Image";
        $data['store_item_id'] = $id;
        return view('admin/store_items/upload_image', $data);
    }

    public function delete_image($id, $redirect = true)
    {
        $model = new StoreItemModel();
        $store_item = $model->find($id);

        $image_name = $store_item->big_pic;

        $big_pic_path = $this->getStoreItemImageLink($image_name, 'big_pic');
        deleteImage($big_pic_path);
        $small_pic_path = $this->getStoreItemImageLink($image_name, 'small_pic');
        deleteImage($small_pic_path);

        $store_item->big_pic = null; 
        $store_item->small_pic = null;
        $model->protect(false)->save($store_item);

        if($redirect)
            return redirect()->to('/admin/store_items/edit/' . $id)->with('success', 'Image Deleted Successfully!!');

        return true;
    }



    // === === === === === === === === === === === === === === === ===
    // Not Changeable functions
    // === === === === === === === === === === === === === === === ===
    public function store_image($id = null, $type = 'small_pic')
    {
        if(is_null($id)) {
            show_404();
        }
        $model = new StoreItemModel();
        $model->getStoreImage($id, $type);
    }

    public function getStoreItemImageLink($imageName, $type = 'small_pic')
    {
        return WRITEPATH . 'uploads/store_items/' . $type . '/' . $imageName;
    }
}
