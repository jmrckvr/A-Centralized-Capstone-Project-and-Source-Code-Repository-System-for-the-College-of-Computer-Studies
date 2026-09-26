@extends('layouts.app', ['title' => 'Overview'])

@section('content')
<div class="d-flex flex-wrap align-items-end justify-content-between gap-3 mb-4">
    <div><div class="eyebrow mb-2">Thursday, September 17, 2026</div><h1 class="h3 fw-bold mb-1">Good morning, Maria.</h1><p class="text-secondary mb-0">Here is what is happening across the CCS project workspace.</p></div>
    <a href="{{ route('projects.index') }}" class="btn btn-primary px-3">＋ Browse projects</a>
</div>
<div class="row g-3 mb-4">
@foreach($stats as $stat)
    <div class="col-6 col-xl-3"><div class="surface p-3 p-lg-4 h-100"><div class="d-flex justify-content-between align-items-start mb-3"><span class="text-secondary small">{{ $stat['label'] }}</span><span class="text-red">◈</span></div><div class="stat-value">{{ $stat['value'] }}</div><div class="small text-secondary mt-1">{{ $stat['change'] }}</div></div></div>
@endforeach
</div>
<div class="row g-4">
    <div class="col-xl-8"><div class="surface overflow-hidden"><div class="p-4 d-flex align-items-center justify-content-between border-bottom"><div><h2 class="h6 fw-bold mb-1">Recent projects</h2><p class="text-secondary small mb-0">The latest work added to the repository.</p></div><a href="{{ route('projects.index') }}" class="small text-red text-decoration-none fw-semibold">View all →</a></div>
        <div class="table-responsive"><table class="table align-middle mb-0"><thead><tr class="text-secondary small"><th class="ps-4 fw-normal">Project</th><th class="fw-normal">Team</th><th class="fw-normal">Status</th><th class="pe-4 fw-normal text-end">Updated</th></tr></thead><tbody>
        @foreach($recentProjects as $project)<tr class="repo-row"><td class="ps-4"><a href="{{ route('projects.show', $project['slug']) }}" class="text-decoration-none text-dark fw-semibold"><span class="text-red me-2">□</span>{{ $project['title'] }}</a><div class="small text-secondary ms-4">{{ $project['tech'] }}</div></td><td class="small text-secondary">{{ $project['team'] }}</td><td><span class="badge rounded-pill {{ $project['status'] === 'Approved' ? 'bg-success-subtle text-success' : ($project['status'] === 'For review' ? 'bg-warning-subtle text-warning-emphasis' : 'badge-soft') }}">{{ $project['status'] }}</span></td><td class="pe-4 text-end small text-secondary">{{ $project['updated'] }}</td></tr>@endforeach
        </tbody></table></div></div></div>
    <div class="col-xl-4"><div class="surface p-4 h-100"><div class="d-flex justify-content-between align-items-start mb-4"><div><h2 class="h6 fw-bold mb-1">Review queue</h2><p class="text-secondary small mb-0">Projects needing your attention.</p></div><span class="badge badge-soft rounded-pill">6 open</span></div><div class="d-flex gap-3 pb-3 mb-3 border-bottom"><span class="rounded-2 bg-warning-subtle text-warning-emphasis p-2">◷</span><div><strong class="d-block small">RouteWise logistics</strong><small class="text-secondary">Submitted by J. Dela Cruz · 5h ago</small></div></div><div class="d-flex gap-3 pb-3 mb-3 border-bottom"><span class="rounded-2 bg-danger-subtle text-danger p-2">!</span><div><strong class="d-block small">Library resource hub</strong><small class="text-secondary">Revision requested · Yesterday</small></div></div><a href="#" class="btn btn-light border w-100 btn-sm">Open review queue</a></div></div>
</div>
@endsection