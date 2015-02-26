<?php namespace Anomaly\Streams\Platform\Entry\Contract;

use Anomaly\Streams\Platform\Addon\FieldType\Contract\DateFieldTypeInterface;
use Anomaly\Streams\Platform\Addon\FieldType\Contract\RelationFieldTypeInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Assignment\Contract\AssignmentInterface;
use Anomaly\Streams\Platform\Field\Contract\FieldInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Interface EntryInterface
 *
 * @link    http://anomaly.is/streams-platform
 * @author  AnomalyLabs, Inc. <hello@anomaly.is>
 * @author  Ryan Thompson <ryan@anomaly.is>
 * @package Anomaly\Streams\Platform\Entry\Contract
 */
interface EntryInterface
{

    /**
     * Get the ID.
     *
     * @return mixed
     */
    public function getId();

    /**
     * Get the title.
     *
     * @return mixed
     */
    public function getTitle();

    /**
     * Get the stream.
     *
     * @return StreamInterface
     */
    public function getStream();

    /**
     * Get a field by it's slug.
     *
     * @param  $slug
     * @return FieldInterface
     */
    public function getField($slug);

    /**
     * Return whether the entry has a field.
     *
     * @param  $slug
     * @return bool
     */
    public function hasField($slug);

    /**
     * Get a field value.
     *
     * @param      $fieldSlug
     * @param null $locale
     * @return mixed
     */
    public function getFieldValue($fieldSlug, $locale = null);

    /**
     * Get a field type presenter.
     *
     * @param $fieldSlug
     * @return FieldTypePresenter
     */
    public function getFieldPresenter($fieldSlug);

    /**
     * Set a field value.
     *
     * @param $fieldSlug
     * @param $value
     * @return mixed
     */
    public function setFieldValue($fieldSlug, $value);

    /**
     * Get a field's type by the field's slug.
     *
     * @param  $fieldSlug
     * @return FieldType|RelationFieldTypeInterface|DateFieldTypeInterface
     */
    public function getFieldType($fieldSlug);

    /**
     * Get the rules for a field.
     *
     * @param  $fieldSlug
     * @return array
     */
    public function getFieldRules($fieldSlug);

    /**
     * Get an assignment by field slug.
     *
     * @param  $fieldSlug
     * @return AssignmentInterface
     */
    public function getAssignment($fieldSlug);

    /**
     * Get a specified relationship.
     *
     * @param  string $relation
     * @return mixed
     */
    public function getRelation($relation);

    /**
     * Get the translatable flag.
     *
     * @return mixed
     */
    public function isTranslatable();

    /**
     * Return whether or not the assignment for
     * the given field slug is translatable.
     *
     * @param $fieldSlug
     * @return bool
     */
    public function assignmentIsTranslatable($fieldSlug);

    /**
     * Set an attribute value.
     *
     * @param  $key
     * @param  $value
     * @return mixed
     */
    public function setAttribute($key, $value);

    /**
     * Get an attribute value.
     *
     * @param  $key
     * @return mixed
     */
    public function getAttribute($key);

    /**
     * Get the entry attributes.
     *
     * @return array
     */
    public function getAttributes();
}
