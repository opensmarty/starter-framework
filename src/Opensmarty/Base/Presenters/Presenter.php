<?php
/**
 * Created for someline-starter.
 * User: Libern
 */

namespace Someline\Base\Presenters;


use Illuminate\Support\Collection;
use Prettus\Repository\Presenter\FractalPresenter;
use Illuminate\Pagination\AbstractPaginator;

abstract class Presenter extends FractalPresenter
{

    protected $meta = [];

    /**
     * Prepare data to present
     *
     * @param $data
     *
     * @return mixed
     * @throws Exception
     */
    public function present($data)
    {
        if (!class_exists('League\Fractal\Manager')) {
            throw new Exception(trans('repository::packages.league_fractal_required'));
        }

        if ($data instanceof Collection) {
            $this->resource = $this->transformCollection($data);
        } elseif ($data instanceof AbstractPaginator) {
            $this->resource = $this->transformPaginator($data);
        } else {
            $this->resource = $this->transformItem($data);
        }

        // set meta
        $this->resource->setMeta($this->meta);

        return $this->fractal->createData($this->resource)->toArray();
    }

    /**
     * @param array $meta
     */
    public function setMeta(array $meta)
    {
        $this->meta = $meta;
    }
}