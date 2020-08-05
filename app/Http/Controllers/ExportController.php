<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Post;

class ExportController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    //
    /**
     * @inheritDoc
     */
    public function collection()
    {
        $datas = Post::all();
        // TODO: Implement collection() method.
        foreach ($datas as $row) {
            $catename = "";
            if(!empty($row->cates)){
                foreach($row->cates as $role){
                    $catename = $role['title']." ".$catename;
                }
            }else
            {
                $catename = "None";
            }
            $order[] = array(
                '0' => $row->id,
                '1' => $row->title,
                '2' => "https://kenhtuyensinh24h.vn/".$row->slugs->slug,
                '3' => $catename
            );
        }

        return (collect($order));
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        // TODO: Implement headings() method.
        return [
            'id',
            'Tên',
            'URL',
            'DANH MUC',
        ];
    }
    public function export(){
        return Excel::download(new ExportController(), 'ahihi.xlsx');
    }
}
