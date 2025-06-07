<div x-data="{ show: false }" x-init="setTimeout(() => show = true, 2)" x-show="show" x-transition
    @keydown.escape.window="show = false; $wire.dispatch('modalClosed')"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">

    <div class="w-full max-w-lg p-6 bg-white rounded shadow-lg">
        <h2 class="mb-4 text-xl font-bold">{{ $projectId ? 'Edit Project' : 'Add Project' }}</h2>

        @if (session()->has('message'))
            <div class="p-2 mb-4 text-green-700 bg-green-100 rounded">{{ session('message') }}</div>
        @endif

        <form wire:submit.prevent="save" class="space-y-4">
            <div>
                <label class="block mb-1 font-semibold">Name</label>
                <input type="text" wire:model.defer="name" class="w-full px-3 py-2 border rounded" />
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold">Status</label>
                <input type="text" wire:model.defer="status" class="w-full px-3 py-2 border rounded" />
                @error('status')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold">Progress (%)</label>
                <input type="number" wire:model.defer="progress" min="0" max="100"
                    class="w-full px-3 py-2 border rounded" />
                @error('progress')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold">Client</label>
                <input type="text" wire:model.defer="client" class="w-full px-3 py-2 border rounded" />
                @error('client')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold">Priority</label>
                <input type="text" wire:model.defer="priority" class="w-full px-3 py-2 border rounded" />
                @error('priority')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-semibold">Deadline</label>
                <input type="date" wire:model.defer="deadline" class="w-full px-3 py-2 border rounded" />
                @error('deadline')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" wire:click="closeModal" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded">Save</button>
            </div>
        </form>
    </div>
</div>
