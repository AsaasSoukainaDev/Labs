<?php

interface DisciplineReaderInterface
{
    /**
     * @return Discipline[]
     */
    public function findAll(): array;
}
