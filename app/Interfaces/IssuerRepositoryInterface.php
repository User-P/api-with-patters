<?php

	namespace App\Interfaces;

	interface IssuerRepositoryInterface
	{
		public function getAllIssuers(int $accountID, array $relations = []);

		public function getIssuerById(int $id);

		public function createIssuer(array $data);

        public function createCertificate(array $data);

        public function createIssuerDetails(int $issuerID,array $data);

		public function updateIssuer(array $data, int $id);

		public function deleteIssuer(int $id);

	}
