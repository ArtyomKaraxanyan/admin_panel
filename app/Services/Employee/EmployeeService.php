<?php

namespace App\Services\Employee;

use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeInterface;
use Illuminate\Support\Facades\DB;

class EmployeeService
{
    /**
     * @var \App\Repositories\Interfaces\EmployeeInterface
     */
    private $employeeRepository;

    /**
     * EmployeeService constructor.
     *
     * @param EmployeeInterface $employeeRepository
     */
    public function __construct(
        EmployeeInterface $employeeRepository
    ) {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Get companies
     * @throws \Throwable
     */
    public function get()
    {
        return $this->employeeRepository->paginate();
    }

    /**
     * @param array $data
     * @throws \Throwable
     */
    public function create(array $data)
    {
        $employee = $this->employeeRepository->create($data);
        return $employee;
    }

    /**
     * @param array $data
     * @param Employee $employee
     * @throws \Throwable
     */
    public function update(Employee $employee, array $data)
    {
        $this->employeeRepository->update($employee, $data);
        return $employee;
    }

    /**
     * @param Employee $employee
     * @throws \Throwable
     */
    public function delete(Employee $employee)
    {
        $this->employeeRepository->delete($employee);
    }


}
