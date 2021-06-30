<?php


namespace core\classes;


class Request
{
    private $postParameters;

    private $getParameters;

    private $isPost = false;


    public function getPostParameters() {

        return $this->postParameters;
    }
        public function setPostParameters($paramPost) {

        $this->postParameters = $paramPost;
    }

        public function getGetParameters() {

        return $this->getParameters;
    }
        public function setGetParameters($param) {

        $this->getParameters = $param;
    }

    public function isPost() {

        return $this->isPost;
    }

    public function setIsPost($isPost) {

        $this->isPost = $isPost;
    }



}