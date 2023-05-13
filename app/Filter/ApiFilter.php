<?php

namespace App\Filter;

use Illuminate\Http\Request;

class ApiFilter
{
    protected $safeParams = [];

    protected $columnMap = [];

    protected $operatorMap = [];


    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $param => $operators) {
            $query = $request->query($param);
// dd($query);
            if (!isset($query)) {
                continue;
            }

            $column = $param;

            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    if ($operator === 'li') {
                        $eloQuery[] = [$column, 'LIKE', '%' . $query[$operator] . '%'];
                    } else {
                        if (is_array($query[$operator])) {
                            foreach ($query[$operator] as $value) {
                                $eloQuery[] = [$column, $this->operatorMap[$operator], $value];
                            }
                        } else {
                            $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                        }
                    }
                }
            }
        }

        return $eloQuery;
    }
}
