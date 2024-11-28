<?php


/**
 * Handle file upload
 * @throws Exception
 */

function handle_upload($input_name, $model = null)
{
    try {
        if (request()->hasFile($input_name)) {

            if ($model && \File::exists(public_path($model->{$input_name}))) {
                \File::delete(public_path($model->{$input_name}));
            }

            $file = request()->file($input_name);
            $file_name = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads'), $file_name);

            $file_path = '/uploads/' . $file_name;

            return $file_path;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

function delete_file_exists($file_path)
{
    try {
        if (\File::exists(public_path($file_path))) {
            \File::delete(public_path($file_path));
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

