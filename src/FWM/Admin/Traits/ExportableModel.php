<?php namespace FWM\Admin\Traits;

use Schema;
use Response;

trait ExportableModel
{

    public function export($query = false)
    {
        $filename = $this->getTable();

        $this->stripExportable();
        $columns = $this->getExportableColumns();

        if ( empty($columns) )
        {
            $columns = '*';
        }

        $headers = [
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename='.$filename.'-'.$this->stamp().'.csv',
            'Expires'             => '0',
            'Pragma'              => 'public'
        ];

        $list = $this->select($columns);

        if ( $query && is_array($query) ) {
            foreach ( $query as $key => $data ) {
                foreach($data as $value) {
                    $list->$key($value[0], $value[1], $value[2]);
                }
            }
        }

        $list = $list->get();

        if ( ( $count = $list->count() ) > 0 ) {
            $list = $list->toArray();
            # add headers for each column in the CSV download
            array_unshift($list, array_keys($list[0]));

            $callback = function() use ($list)
            {
                $FH = fopen('php://output', 'w');
                foreach ($list as $row) {
                    fputcsv($FH, $row);
                }
                fclose($FH);
            };

            return Response::stream($callback, 200, $headers);
        }

        flash()->error('No results to export.');

        return redirect()->back();
    }

    /**
     * Get the exportable attributes for the model.
     *
     * @return array
     */
    public function getExportableColumns()
    {
        return $this->exportableColumns;
    }

    protected function stamp() {
        return date('d-m-Y-his');
    }

    protected function stripExportable(){
        $columns = Schema::getColumnListing($this->getTable());

        if ( is_array($this->exportableColumns) )
        {
            foreach($this->exportableColumns as $k => $v) {
                if (array_search($v, $columns) === false) {
                    unset($this->exportableColumns[$k]);
                }
            }
        }
    }

}
