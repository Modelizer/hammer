<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateJobRequest;
use App\Models\Job;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class JobController extends Controller
{
    /**
     * @param Job $job
     * @return JsonResponse
     * @throws \InvalidArgumentException
     */
    public function index(Job $job)
    {
        return new JsonResponse([
            'status' => 'success',
            'result' => $job->with('service', 'location')->paginate(),
        ]);
    }

    /**
     * @param ValidateJobRequest $request
     * @param Job $job
     * @return JsonResponse
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function store(ValidateJobRequest $request, Job $job)
    {
        if ($job->fill($request->all())->save()) {
            return new JsonResponse([
                'message' => 'Successfully job posted.',
                'status' => 'success',
            ]);
        }

        return new JsonResponse([
            'message' => 'Something went wrong',
            'status' => 'error',
        ], 500);
    }

    /**
     * @param $id
     * @param Job $job
     * @return JsonResponse
     */
    public function edit($id, Job $job)
    {
        try {
            $job = $job->findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return $this->getJobNotFoundResponse();
        }

        return new JsonResponse([
            'status' => 'success',
            'result' => $job,
        ]);
    }

    /**
     * @param $id
     * @param ValidateJobRequest $request
     * @param Job $job
     * @return JsonResponse
     */
    public function update($id, ValidateJobRequest $request, Job $job)
    {
        try {
            $job->findOrFail($id)->update($request->toArray());
        } catch (ModelNotFoundException $exception) {
            return $this->getJobNotFoundResponse();
        }

        return new JsonResponse([
            'message' => 'Job updated successfully.',
            'status' => 'updated',
        ]);
    }

    /**
     * @param $id
     * @param Job $job
     * @return JsonResponse
     */
    public function delete($id, Job $job)
    {
         try {
             $job->findOrFail($id)->delete();
         } catch (ModelNotFoundException $exception) {
             return $this->getJobNotFoundResponse();
         }

         return new JsonResponse([
             'message' => 'Job deleted successfully.',
             'status' => 'deleted',
         ]);
    }


    /**
     * @return JsonResponse
     */
    protected function getJobNotFoundResponse()
    {
        return new JsonResponse([
            'message' => 'No job found by given job id.',
            'status' => 'not_found'
        ], 404);
    }
}
