<?php

interface CrudInterface
{
    public function read();
    public function create();
    public function show($id);
    public function update($id);
    public function delete($id);
    public function getLocalTimeWithZone();
    public function getClientIpAddress();
}
