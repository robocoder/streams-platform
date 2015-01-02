<?php namespace Anomaly\Streams\Platform\Ui\Table\Component\Filter;

use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Class FilterNormalizer
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Platform\Ui\Table\Component\Filter
 */
class FilterNormalizer
{

    /**
     * Normalize filter input.
     *
     * @param array           $filters
     * @param StreamInterface $stream
     * @return array
     */
    public function normalize(array $filters, StreamInterface $stream = null)
    {
        foreach ($filters as $slug => &$filter) {

            /**
             * If the slug is numeric and the parameter is
             * a string then assume the parameter is a field
             * type and that the parameter is the field slug.
             */
            if (is_numeric($slug) && is_string($filter)) {
                $filter = [
                    'slug'   => $filter,
                    'field'  => $filter,
                    'filter' => 'field',
                ];
            }

            /**
             * If the slug is NOT numeric and the parameter is a
             * string then use the slug as the slug and the
             * parameter as the filter.
             */
            if (!is_numeric($slug) && is_string($filter)) {
                $filter = [
                    'slug'   => $slug,
                    'filter' => $filter,
                ];
            }

            /**
             * If the slug is not numeric and the parameter is an
             * array without a slug then use the slug for
             * the slug for the filter.
             */
            if (is_array($filter) && !isset($filter['slug']) && !is_numeric($slug)) {
                $filter['slug'] = $slug;
            }

            /**
             * Set the table's stream.
             */
            $filter['stream'] = $stream;
        }

        return $filters;
    }
}
