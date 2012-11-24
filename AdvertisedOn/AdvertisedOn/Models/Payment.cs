namespace AdvertisedOn.Models
{
    public class Payment
    {
        public int PaymentId { get; set; }
        public virtual PaymentType Type { get; set; }
        public string Information { get; set; }
    }
}