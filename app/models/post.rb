class Post < ApplicationRecord
  scope :published, -> { where(published: true) }
  scope :sorted, -> { order(pinned: :desc, created_at: :desc) }

  paginates_per 9

  def read_time
    content.nil? ? 0 : (content.length / 500.0).ceil
  end
end
